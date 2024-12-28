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
        $totalOrders = Order::where('status', 'completed')->count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();    
        $data = Product::paginate(5); 

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
        $totalOrders = Order::where('status', 'completed')->count();
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
      
        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');

         
            $validated = $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,webp|max:2048', 
            ]);

          
            $imagePath = 'frontend/img/img/product/' . $file->getClientOriginalName();
            $file->storeAs('frontend/img/img/product', $file->getClientOriginalName(), 'public');
        }

       
        Product::create([
            'name' => $request->name,
            'image' => $imagePath,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('Product.index')->with('demo', 'Thêm sản phẩm thành công!');
    } catch (\Exception $e) {
        return redirect()->back()->with('saitt', 'Lỗi: ' . $e->getMessage());
    }
}

    

    public function editsanpham($id)
    {  
        $totalOrders = Order::where('status', 'completed')->count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get(); 
        $product = Product::findOrFail($id);
        $categories = Category::all(); 

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

           
            if ($request->hasFile('image')) {
                
                if ($product->image && Storage::exists(public_path('frontend/img/img/product/' . $product->image))) {
                    Storage::delete(public_path('frontend/img/img/product/' . $product->image));
                }

               
                $file = $request->file('image');
                $imageName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME), '_') 
                             . '.' . $file->getClientOriginalExtension();

               
                $file->move(public_path('frontend/img/img/product'), $imageName);

               
                $product->image = $imageName;
            }

           
            $product->name = $request->name;
            $product->price = $request->price;
            $product->sale_price = $request->sale_price;
            $product->category_id = $request->category_id;
            $product->status = $request->status;
            $product->description = $request->description;

            $product->save();

            return redirect()->route('Product.index')->with('demo', 'Cập nhật sản phẩm thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('saitt', 'Lỗi: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            
            $product = Product::findOrFail($id);

           
            if ($product->image && Storage::exists(public_path('frontend/img/img/product/' . $product->image))) {
                Storage::delete(public_path('frontend/img/img/product/' . $product->image));
            }

           
            $product->delete();

            return redirect()->route('Product.index')->with('demo', 'Sản phẩm đã được xóa thành công!');
        } catch (\Exception $e) {
            return redirect()->route('Product.index')->with('saitt', 'Lỗi: ' . $e->getMessage());
        }
    }
    public function xemsp($category_id)
    {
        $totalOrders = Order::where('status', 'completed')->count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();    
        $data = Product::where('category_id',$category_id)->paginate(5);

        

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
}
