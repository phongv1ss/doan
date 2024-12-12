<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
            $cartItems = Cart::with('product')->get(); // Lấy thông tin sản phẩm trong giỏ
            return view('front.shop.cart', compact('cartItems'));
    }

    public function add(Request $request)
    {
            // Kiểm tra nếu người dùng chưa đăng nhập, ta lưu thông tin giỏ hàng trong session
            $product = Product::find($request->product_id);
            $quantity = $request->input('quantity', 1);
    
            if (!$product) {
                return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
            }
            // Lấy thông tin giỏ hàng từ session, nếu không có thì tạo mới
            $cart = session()->get('cart', []);
            // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng lên 1
            if (isset($cart[$request->product_id])) {
                $cart[$request->product_id]['quantity']++;
            } else {
                // Nếu sản phẩm chưa có trong giỏ, thêm mới
                $cart[$request->product_id] = [
                    'name' => $product->name,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'image' => $product->image,
                ];
            }
            // Lưu giỏ hàng vào session
            session()->put('cart', $cart);
    
            return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }

    public function removeFromCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $cart = session()->get('cart', []);

        if (isset($cart[$product_id])) {
            unset($cart[$product_id]); // Xóa sản phẩm khỏi giỏ hàng
            session()->put('cart', $cart); // Cập nhật lại giỏ hàng
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
    }    
}
