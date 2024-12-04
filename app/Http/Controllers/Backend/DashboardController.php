<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class DashboardController extends Controller
{
public function __construct() {
    
}

public function index(){
    $totalOrders = Order::count();
    $orders = Order::orderBy('created_at', 'desc')->take(5)->get();
    $totalOrders = DB::table('orders')->count();
    $monthlyRevenue = DB::table('order_details')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->selectRaw('MONTH(orders.created_at) as month, SUM(order_details.price * order_details.quantity) as revenue')
        ->groupBy('month')
        ->orderBy('month')
        ->get();
    $months = [];
    $salesData = [];

    for ($i = 1; $i <= 12; $i++) {
        $months[] = "Tháng $i";
        $revenue = $monthlyRevenue->firstWhere('month', $i)->revenue ?? 0;
        $salesData[] = $revenue;
    }
    $config= $this->config();
    $template ='backend.dashboard.home.index';
    $totalOrders = DB::table('orders')->count();
    $totalRevenue = DB::table('order_details')
        ->selectRaw('SUM(price * quantity) as total_revenue')
        ->value('total_revenue');
        
    return view('backend.dashboard.layout',compact(
        'template',
        'config',
        'months', 
        'salesData',
        'totalOrders', 
        'totalRevenue',
        'totalOrders',
        'orders',

    ));
}
public function showNotifications()
{
    $newOrders = Order::where('status', 'new')->get(); // Lấy các đơn hàng mới
    return view('backend.notifications', compact('newOrders'));
}

private function config(){
    return[
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




?>