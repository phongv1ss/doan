<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Category; 

class ShopController extends Controller
{
    public function index() {
          // Thêm đoạn code lấy comments
          $comments = DB::table('comments')
          ->join('users', 'comments.user_id', '=', 'users.id')
          ->join('products', 'comments.product_id', '=', 'products.id')
          ->select(
              'comments.*',
              'users.name as user_name',
              'products.name as product_name'
          )
          ->orderBy('comments.created_at', 'desc')
          ->take(5)  // Lấy 5 comment mới nhất
          ->get();
        $products = Product::all(); 
        return view('index', compact('products', 'comments'));
    }
    public function show($id) {
        $product = Product::findOrFail($id); // Tìm sản phẩm theo ID
        return view('front.shop.show', compact('product')); // Truyền biến $product vào view chi tiết
    }
    public function shopGrid(Request $request) {
        $categories = Category::all();
        $products = $this->getSortedProducts($request);
        $sort = $request->input('sort', 'asc');
    
        return view('front.shop.shopgrid', compact('categories', 'products', 'sort'));
    }

    public function search(Request $request) {
        $query = $request->input('query'); 
        $sort = $request->input('sort', 'asc'); 
        $products = Product::where('name', 'LIKE', "%{$query}%")
                            ->where('status', 1)
                            ->orderBy('price', $sort)
                            ->get();
        
        $products = Product::where('description', 'LIKE', "%{$query}%")
        ->where('status', 1)
        ->orderBy('price', $sort)
        ->get();
    
        return view('front.shop.search', compact('products', 'query', 'sort'));
    }
    

    public function categoryProducts(Request $request, $categoryId) 
    {
        $currentCategory = Category::findOrFail($categoryId); 
        $categories = Category::all();
        $products = Product::where('category_id', $categoryId)
                            ->orderBy('price', $request->input('sort', 'asc'))
                            ->paginate(9);

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

    public function getSortedProducts(Request $request) {
        // Lấy tham số sắp xếp từ request
        $sort = $request->input('sort', 'asc'); // Mặc định là tăng dần
    
        // Lấy sản phẩm theo sắp xếp
        return Product::orderBy('price', $sort)->get();
    }
}
