<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();    
        $data = Product::paginate(5);  // Chỉ lấy 5 sản phẩm mỗi trang

        $config['seo'] = config('apps.user');
        $config['css'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
        ];
        $config['js'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            'backend/library/location.js'
        ];
        $config['method'] = 'quanlysanpham';
        $template = 'backend.Product.index';

        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'data',
            'totalOrders',
            'orders'
        ));
    }

    public function createsanpham()
    {
        $totalOrders = Order::count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();
        $categories = Category::where('status', 1)->get();
    
        $config['seo'] = config('apps.user');
        $config['css'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
        ];
        $config['js'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            'backend/library/location.js'
        ];
        $config['method'] = 'themsanpham';
        $template = 'backend.Product.create';
    
        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'categories',
            'totalOrders',
            'orders'
        ));
    }
    

    public function storesanpham(Request $request)
{
    try {
        // Kiểm tra và xử lý hình ảnh
        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // Lấy file từ request

            // Xác thực file (đảm bảo đúng định dạng và kích thước)
            $validated = $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,webp|max:2048', // Giới hạn 2MB
            ]);

            // Lưu file vào thư mục public/storage/frontend/img/img/product
            $imagePath = 'frontend/img/img/product/' . $file->getClientOriginalName();
            $file->storeAs('frontend/img/img/product', $file->getClientOriginalName(), 'public');
        }

        // Lưu thông tin sản phẩm vào database
        Product::create([
            'name' => $request->name,
            'image' => $imagePath,  // Đường dẫn hình ảnh lưu vào CSDL
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('Product.index')->with('success', 'Thêm sản phẩm thành công!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Lỗi: ' . $e->getMessage());
    }
}

    

    public function editsanpham($id)
    {  
        $totalOrders = Order::count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get(); 
        $product = Product::findOrFail($id);
        $categories = Category::all();  // Lấy tất cả các danh mục

        $config['seo'] = config('apps.user');
        $config['css'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
        ];
        $config['js'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            'backend/library/location.js'
        ];
        $config['method'] = 'suasanpham';
        $template = 'backend.Product.update';

        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'categories',
            'product',
            'totalOrders',
            'orders'
        ));
    }

    public function updatesanpham(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);

            // Kiểm tra và xử lý hình ảnh
            if ($request->hasFile('image')) {
                // Xóa hình cũ nếu tồn tại
                if ($product->image && Storage::exists(public_path('frontend/img/img/product/' . $product->image))) {
                    Storage::delete(public_path('frontend/img/img/product/' . $product->image));
                }

                // Lấy file upload và xử lý tên file
                $file = $request->file('image');
                $imageName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME), '_') 
                             . '.' . $file->getClientOriginalExtension();

                // Lưu file vào thư mục public/frontend/img/img/product
                $file->move(public_path('frontend/img/img/product'), $imageName);

                // Gán tên file mới cho sản phẩm
                $product->image = $imageName;
            }

            // Cập nhật các trường khác của sản phẩm
            $product->name = $request->name;
            $product->price = $request->price;
            $product->sale_price = $request->sale_price;
            $product->category_id = $request->category_id;
            $product->status = $request->status;
            $product->description = $request->description;

            $product->save();

            return redirect()->route('Product.index')->with('success', 'Cập nhật sản phẩm thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lỗi: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            // Tìm sản phẩm theo ID
            $product = Product::findOrFail($id);

            // Xóa hình ảnh nếu tồn tại
            if ($product->image && Storage::exists(public_path('frontend/img/img/product/' . $product->image))) {
                Storage::delete(public_path('frontend/img/img/product/' . $product->image));
            }

            // Xóa bản ghi sản phẩm khỏi cơ sở dữ liệu
            $product->delete();

            return redirect()->route('Product.index')->with('success', 'Sản phẩm đã được xóa thành công!');
        } catch (\Exception $e) {
            return redirect()->route('Product.index')->with('error', 'Lỗi: ' . $e->getMessage());
        }
    }
}
