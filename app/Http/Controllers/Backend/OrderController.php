<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct() {
        // Constructor nếu cần cấu hình chung
    }

    public function index() {     
        $totalOrders = Order::count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();
        $data = DB::table('orders')
        ->join('users', 'orders.users_id', '=', 'users.id') // JOIN với bảng 'users' qua cột 'users_id'
        ->join('order_details', 'orders.id', '=', 'order_details.order_id') // JOIN với bảng 'order_details'
        ->select(
            'orders.id as order_id',
            'users.name as customer_name', // Lấy 'name' từ bảng 'users'
            'users.email as customer_email', // Lấy 'email' từ bảng 'users'
            'orders.created_at as order_date',
            DB::raw('SUM(order_details.quantity * order_details.price) as total_price') // Tính tổng tiền từ 'order_details'
        )
        ->groupBy('orders.id', 'users.name', 'users.email', 'orders.created_at') // GROUP BY để tính tổng tiền đúng
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
        $totalOrders = Order::count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();
        $order = DB::table('orders')
            ->join('users', 'orders.users_id', '=', 'users.id')
            ->where('orders.id', $id)
            ->select(
                'orders.id as order_id',
                'users.name as customer_name',
                'users.email as customer_email',
                'orders.created_at as order_date'
            )
            ->first();
    
        $orderDetails = DB::table('order_details')
            ->where('order_id', $id)
            ->get();
    
        if (!$order) {
            return redirect()->route('Order.index')->with('error', 'Đơn hàng không tồn tại.');
        }
    
        $config['seo'] = config('apps.user');
        $config['method'] = 'xemdonhang';
        $template = 'backend.Order.View';

        return view('backend.dashboard.layout', compact(
        'template',
        'config',
        'order',
        'orderDetails','totalOrders',
        'orders',
    ));
    }
    public function delete(Request $request, $id) {
        // Kiểm tra đơn hàng tồn tại
        $order = DB::table('orders')->where('id', $id)->first();
    
        if (!$order) {
            return redirect()->route('Order.index')->with('error', 'Đơn hàng không tồn tại.');
        }
    
        // Xóa chi tiết đơn hàng trước
        DB::table('order_details')->where('order_id', $id)->delete();
    
        // Xóa đơn hàng
        DB::table('orders')->where('id', $id)->delete();
    
        return redirect()->route('Order.index')->with('success', 'Đơn hàng đã được xóa thành công.');
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
}
