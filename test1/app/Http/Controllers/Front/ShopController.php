<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category; // Import Model Category

class ShopController extends Controller
{

    public function index() {
        
        $products = Product::all(); // Lấy toàn bộ sản phẩm từ database
        return view('index', compact('products')); // Truyền biến $products vào view
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

    public function categoryProducts($categoryId)
    {
    // Lấy danh mục hiện tại
    $currentCategory = Category::findOrFail($categoryId);

    // Lấy danh sách sản phẩm thuộc danh mục đó
    $products = Product::where('category_id', $categoryId)->paginate(9);

    // Lấy tất cả danh mục để hiển thị sidebar
    $categories = Category::all();

    return view('front.shop.category_products', compact('products', 'categories', 'currentCategory'));
    }   

}
