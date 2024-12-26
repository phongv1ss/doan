<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu giỏ hàng từ session (nếu cần)
        $cart = session()->get('cart', []);

        // Truyền dữ liệu giỏ hàng tới view
        return view('front.shop.checkout', compact('cart'));
    }

   public function processCheckout(Request $request) {
        // Xác thực dữ liệu đầu vào
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'payment_method' => 'required|in:cod,bank',
        ]);
    
        $cart = session()->get('cart', []); // Lấy giỏ hàng từ session
    
        // Kiểm tra nếu giỏ hàng rỗng
        if (empty($cart)) {
            return back()->with('error', 'Giỏ hàng của bạn hiện đang trống.');
        }
    
        // Tính tổng tiền
        $shippingFee = 30000; // Phí vận chuyển cố định
        $total = array_sum(array_map(function ($details) {
            return $details['price'] * $details['quantity'];
        }, $cart)) + $shippingFee;
    
        DB::beginTransaction();
        try {
            // Lưu thông tin đơn hàng vào bảng orders
            $order = Order::create([
                'customer_id' => Auth::id(), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            // Lưu chi tiết đơn hàng vào bảng order_details
            foreach ($cart as $productId => $details) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $details['quantity'],
                    'price' => $details['price'],
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'phone' => $validated['phone'],
                    'address' => $validated['address'],
                ]);
            }
    
            // Chuẩn bị thông tin đơn hàng để gửi email
            $orderDetails = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'cart' => $cart,
                'total' => $total,
            ];
    
            // Gửi email xác nhận đơn hàng
            Mail::to($validated['email'])->send(new OrderConfirmation($orderDetails));
    
            // Xóa giỏ hàng sau khi thanh toán thành công
            session()->forget('cart');
    
            DB::commit();
    
            // Chuyển hướng tới trang thành công
            return redirect()->route('checkout.success')->with('success', 'Thanh toán thành công! Đơn hàng của bạn đã được xác nhận.');
        } catch (\Exception $e) {
            DB::rollBack();
    
            // Trả về trang trước và hiện thông báo lỗi
            return back()->withInput()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    function successCheckout () {
        return view('front.shop.checkout_success');
    }

    
}
