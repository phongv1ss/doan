<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct() {
       
    }

    public function index() {     
        $totalOrders = Order::where('status', 'completed')->count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();
        $data = DB::table('orders')
        ->join('users', 'orders.users_id', '=', 'users.id') 
        ->join('order_details', 'orders.id', '=', 'order_details.order_id') 
        ->select(
            'orders.id as order_id',
            'users.name as customer_name', 
            'users.email as customer_email', 
            'orders.created_at as order_date',
            'orders.status',
            DB::raw('SUM(order_details.quantity * order_details.price) as total_price')
        )
        ->groupBy('orders.id', 'users.name', 'users.email', 'orders.created_at') 
        ->paginate(5);
    
    $config['seo'] = config('apps.user');
    $config['method'] = 'quanlydonhang';
    $template = 'backend.Order.index';

    return view('backend.dashboard.layout', compact(
        'template',
        'config',
        'data',
        'totalOrders',
        'orders',
    ));
    }
    public function View($id) {
        $totalOrders = Order::where('status', 'completed')->count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();
        
        // Sửa lại query để lấy thêm tên sản phẩm
        $order = DB::table('orders')
            ->join('users', 'orders.users_id', '=', 'users.id')
            ->where('orders.id', $id)
            ->select(
                'orders.id as order_id',
                'users.name as customer_name',
                'users.email as customer_email',
                'orders.created_at as order_date',
                'orders.status'
            )
            ->first();

        // Thêm join với bảng products để lấy tên sản phẩm
        $orderDetails = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->where('order_id', $id)
            ->select(
                'order_details.*',
                'products.name as product_name'
            )
            ->get();

        if (!$order) {
            return redirect()->route('Order.index')->with('saitt', 'Đơn hàng không tồn tại.');
        }
    
        $config['seo'] = config('apps.user');
        $config['method'] = 'xemdonhang';
        $template = 'backend.Order.View';

        return view('backend.dashboard.layout', compact(
        'template',
        'config',
        'order',
        'orderDetails',
        'totalOrders',
        'orders',
    ));
    }
    public function delete(Request $request, $id) {
       
        $order = DB::table('orders')->where('id', $id)->first();
    
        if (!$order) {
            return redirect()->route('Order.index')->with('saitt', 'Đơn hàng không tồn tại.');
        }
    
       
        DB::table('order_details')->where('order_id', $id)->delete();
    
     
        DB::table('orders')->where('id', $id)->delete();
    
        return redirect()->route('Order.index')->with('demo', 'Đơn hàng đã được xóa thành công.');
    }
    public function updateStatus(Request $request, $id) {
       
        $request->validate([
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        $order = DB::table('orders')->where('id', $id)->first();
    
        if (!$order) {
            return redirect()->route('Order.index')->with('saitt', 'Đơn hàng không tồn tại.');
        }
    
        DB::table('orders')->where('id', $id)->update([
            'status' => $request->input('status'),
            'updated_at' => now()
        ]);
    
        return redirect()->route('Order.index')->with('demo', 'Cập nhật trạng thái thành công.');
    }
    
    

    private function config() {
        return [
            'js' => [
                'backend/js/plugins/flot/jquery.flot.js',
                'backend/js/plugins/flot/jquery.flot.tooltip.min.js',
                'backend/js/plugins/flot/jquery.flot.spline.js',
                'backend/js/plugins/flot/jquery.flot.resize.js',
                'backend/js/plugins/flot/jquery.flot.pie.js',
                'backend/js/plugins/flot/jquery.flot.symbol.js',
                'backend/js/plugins/flot/jquery.flot.time.js',
                'backend/js/plugins/peity/jquery.peity.min.js',
                'backend/js/demo/peity-demo.js',
                'backend/js/inspinia.js',
                'backend/js/plugins/pace/pace.min.js',
                'backend/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
                'backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
                'backend/js/plugins/easypiechart/jquery.easypiechart.js',
                'backend/js/plugins/sparkline/jquery.sparkline.min.js',
                'backend/js/demo/sparkline-demo.js'
            ]
        ];
    }

    public function show($id)
    {
        try {
            $order = Order::findOrFail($id);
            
            // Join với bảng products để lấy tên sản phẩm
            $orderDetails = DB::table('order_details')
                ->join('products', 'order_details.product_id', '=', 'products.id')
                ->select(
                    'order_details.*',
                    'products.name as product_name'
                )
                ->where('order_details.order_id', $id)
                ->get();

            return view('backend.Order.View', compact('order', 'orderDetails'));
            
        } catch (\Exception $e) {
            return redirect()->route('Order.index')->with('error', 'Không tìm thấy đơn hàng');
        }
    }
}
