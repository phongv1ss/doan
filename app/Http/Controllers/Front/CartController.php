<?php

namespace App\Http\Controllers\Front;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
            $cartItems = Cart::with('product')->get();
            return view('front.shop.cart', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
            'name' => 'required|string',
            'image' => 'required|string',
        ]);
        $cart = session()->get('cart', []);

        if (isset($cart[$validated['product_id']])) {
            $cart[$validated['product_id']]['quantity'] += $validated['quantity'];
        } else {
            $cart[$validated['product_id']] = [
                'name' => $validated['name'],
                'quantity' => $validated['quantity'],
                'price' => $validated['price'],
                'image' => $validated['image'],
            ];
        }
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }




    public function removeFromCart(Request $request)
{
    $product_id = $request->input('product_id');
    $cart = session()->get('cart', []);

    if (isset($cart[$product_id])) {
        unset($cart[$product_id]); // Xóa sản phẩm khỏi giỏ hàng
        session()->put('cart', $cart); // Cập nhật lại giỏ hàng
    }

    return redirect()->back()->with('demo', 'Sản phẩm đã được xóa khỏi giỏ hàng');
}    
}
