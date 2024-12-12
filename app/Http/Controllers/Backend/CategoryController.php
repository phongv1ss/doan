<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();
        $totalOrders = Order::count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();
        $config['seo'] = config('apps.user');
        $config['css'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
        ];
        $config['js'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            'backend/library/location.js'
        ];
        $config['method'] = 'quanlydanhmuc';
        $template = 'backend.Category.index';

        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'totalOrders',
            'orders',
            'categories',
        ));
    }

    public function create()
    {
       
        $categories = Category::where('status', 1)->get();
        $totalOrders = Order::count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();
        $config['seo'] = config('apps.user');
        $config['css'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
        ];
        $config['js'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            'backend/library/location.js'
        ];
        $config['method'] = 'themdanhmuc';
        $template = 'backend.Category.create';

        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'totalOrders',
            'orders',
            'categories',
        ));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

     
        Category::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('Category.index')
                         ->with('success', 'Danh mục đã được thêm thành công.');
    }

 
    public function edit($category_id)
    {
        $category = Category::findOrFail($category_id);
        $totalOrders = Order::count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();
        $config['seo'] = config('apps.user');
        $config['css'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
        ];
        $config['js'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            'backend/library/location.js'
        ];
        $config['method'] = 'suadanhmuc';
        $template = 'backend.Category.edit';

        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'totalOrders',
            'orders',
            'category',
        ));
    }

    
    public function update(Request $request, $category_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);
    
        $category = Category::findOrFail($category_id);
        $category->name = $request->input('name');
        $category->status = $request->input('status');
        $category->save();
    
        return redirect()->route('Category.index')
                         ->with('success', 'Danh mục đã được cập nhật.');
    }

  
    public function destroy($category_id)
    {
        $category = Category::findOrFail($category_id);
    
        if ($category->products()->count() > 0) {
            return redirect()->route('Category.index')
                             ->with('error', 'Không thể xóa danh mục vì có sản phẩm liên quan.');
        }
    
        $category->delete();
    
        return redirect()->route('Category.index')
                         ->with('success', 'Danh mục đã được xóa.');
    }
    
}
