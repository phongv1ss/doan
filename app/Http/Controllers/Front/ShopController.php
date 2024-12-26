<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Category; 
use App\Models\Comment;
class ShopController extends Controller
{
    public function index() {
        $products = Product::all(); 
        $comments = Comment::with(['user', 'product'])
                      ->latest()
                      ->take(10)
                      ->get();
        return view('index', compact('products', 'comments'));
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
    public function profile() {
        $user = Auth::user();
        
        return view('front.shop.profile', compact('user'));
        
    }
    public function profileupdate(Request $request, $id)
    {
        // Lấy người dùng theo ID
        $user = User::find($id);

        // Kiểm tra nếu người dùng không tồn tại
        if (!$user) {
            return redirect()->route('index')->with('saitt', 'Không tìm thấy User');
        }

        // Xác thực dữ liệu từ request (tùy thuộc vào yêu cầu của bạn)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            // Thêm các trường cần thiết khác ở đây
        ]);

        // Cập nhật thông tin người dùng
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        // Cập nhật các trường khác nếu cần

        // Lưu lại thay đổi
        $user->save();

        // Quay lại trang profile hoặc dashboard với thông báo thành công
        return redirect()->route('shop.profile', ['id' => $user->id])
                         ->with('demo', 'Cập Nhật thành công');
    }
}
