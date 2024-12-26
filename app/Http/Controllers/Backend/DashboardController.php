<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

class DashboardController extends Controller
{
    public function __construct() {
        // Constructor code here if needed
    }

    public function index(){
        // Tổng số đơn hàng 'completed'
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $totalOrders = Order::where('status', 'completed')->count();
        $totalCategories = Category::count();
         // Top 5 sản phẩm bán chạy
         $topProducts = DB::table('order_details')
         ->join('products', 'order_details.product_id', '=', 'products.id')
         ->select(
             'products.name',
             DB::raw('SUM(order_details.quantity) as total_sold')
         )
         ->groupBy('products.id', 'products.name')
         ->orderBy('total_sold', 'desc')
         ->take(5)
         ->get();


        // Lấy các đơn hàng 'completed' mới nhất
        $orders = Order::where('status', 'completed')
                       ->orderBy('created_at', 'desc')
                       ->take(5)
                       ->get();

        // Doanh thu hàng tháng từ các đơn hàng 'completed'
        $monthlyRevenue = DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'completed')
            ->selectRaw('MONTH(orders.created_at) as month, SUM(order_details.price * order_details.quantity) as revenue')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = [];
        $salesData = [];

        // Chuẩn bị dữ liệu cho biểu đồ doanh thu hàng tháng
        for ($i = 1; $i <= 12; $i++) {
            $months[] = "Tháng $i";
            $revenue = $monthlyRevenue->firstWhere('month', $i)->revenue ?? 0;
            $salesData[] = $revenue;
        }

        // Các cấu hình cho view
        $config = $this->config();

        // Tính tổng doanh thu 'completed'
        $totalRevenue = DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'completed') 
            ->selectRaw('SUM(order_details.price * order_details.quantity) as total_revenue')
            ->value('total_revenue');

        // Trả về view với các dữ liệu
         $template = 'backend.dashboard.home.index';
        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'months', 
            'salesData',
            'totalOrders', 
            'totalRevenue',
            'orders',
            'totalProducts',
            'totalUsers',       
            'topProducts',
            'totalCategories',
        ))->with('demo', 'Đăng nhập Thành Công !!!');
    }

    public function showNotifications()
    {
        // Lấy các đơn hàng mới có trạng thái 'new'
        $newOrders = Order::where('status', 'new')->get();
        return view('backend.notifications', compact('newOrders'));
    }

    // Hàm trả về cấu hình
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
