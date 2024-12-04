<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category; 

class ShopController extends Controller
{
    public function index() {
        $products = Product::all(); 
        return view('index', compact('products'));
    }
    public function show($id) {
        $product = Product::findOrFail($id); // Tìm sản phẩm theo ID
        return view('front.shop.show', compact('product')); // Truyền biến $product vào view chi tiết
    }
    public function shopGrid()
    {
        // Lấy tất cả danh mục từ bảng categories
        $categories = Category::all();
        // Lấy sản phẩm (nếu cần)
        $products = Product::all();
        // Trả dữ liệu sang view
        return view('front.shop.shopgrid', compact('categories', 'products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); // Lấy từ khóa từ form
        $products = Product::where('name', 'LIKE', "%{$query}%")
                            ->where('status', 1) // Chỉ lấy sản phẩm đang hoạt động
                            ->get();
        return view('front.shop.search', compact('products', 'query'));
    }
}
