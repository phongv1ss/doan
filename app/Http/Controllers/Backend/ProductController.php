<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\StoreUserRequest;


use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;


class ProductController extends Controller
{
   
    protected $provinceRepository;
    protected $userRepository;

    
    public function __construct(
       
        ProvinceRepository $provinceRepository,
        UserRepository $userRepository
        ){
  
    $this->provinceRepository =$provinceRepository;
    $this->userRepository =$userRepository;
}
    
    public function index(){
        $totalOrders = Order::count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();    
        $data = Product::all();
        $data = Product::paginate(5);
        $config['seo'] = config('apps.user');
        $config['css'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
        ];
        $config['js'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            'backend/library/location.js'
        ];
        $config['method']= 'quanlysanpham';
        $template ='backend.Product.index';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'data',
            'totalOrders',
            'orders',
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
            'orders',
        ));
    }

    public function storesanpham(Request $request)
    {
        try {
            Product::create([
                'name' => $request->name,
                'image' => $request->image,
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
    {  $totalOrders = Order::count();
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
            'orders',
        ));
    }
    
    public function updatesanpham(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'image' => $request->image,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        return redirect()->route('Product.index')->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }
    
    

}
