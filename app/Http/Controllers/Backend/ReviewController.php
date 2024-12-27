<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class ReviewController extends Controller
{
    public function index()
    {
        $totalOrders = Order::where('status', 'completed')->count();
        $orders = Order::where('status', 'completed')
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();
        $reviews = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->join('products', 'comments.product_id', '=', 'products.id')
            ->select(
                'comments.*',
                'users.name as user_name',
                'products.name as product_name'
            )
            ->orderBy('comments.created_at', 'desc')
            ->paginate(10);

        $config = [
            'js' => [
                'backend/js/plugins/dataTables/datatables.min.js',
                'backend/js/plugins/dataTables/dataTables.bootstrap4.min.js',
            ],
            'css' => [
                'backend/css/plugins/dataTables/datatables.min.css',
            ],
            'seo' => [
                'index' => [
                    'title' => 'Quản lý đánh giá'
                ]
            ]
        ];
        
        $template = 'backend.review.index';
        return view('backend.dashboard.layout', compact('template', 'config', 'reviews', 'orders', 'totalOrders'));
    }

    public function destroy($id)
    {
        try {
            Comment::destroy($id);
            return redirect()->route('review.index')->with('success', 'Xóa đánh giá thành công');
        } catch (\Exception $e) {
            return redirect()->route('review.index')->with('error', 'Có lỗi xảy ra khi xóa đánh giá');
        }
    }
} 