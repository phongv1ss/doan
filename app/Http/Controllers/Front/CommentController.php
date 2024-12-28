<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function danhgia()
    {
        $products = Product::all();
        return view('front.shop.danhgia', compact('products'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required',
                'comment' => 'required'
            ]);

            if (!Auth::check()) {
                return redirect()->back()->with('error', 'Vui lòng đăng nhập để gửi đánh giá');
            }

            $comment = new Comment();
            $comment->user_id = Auth::id();
            $comment->product_id = $request->product_id;
            $comment->comment = $request->comment;
            $comment->save();

            return redirect()->route('home')->with('success', 'Đã gửi đánh giá thành công!');

        } catch (\Exception $e) {
            Log::error('Comment Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }

    public function index()
    {
        $comments = Comment::join('users', 'comments.user_id', '=', 'users.id')
                          ->join('products', 'comments.product_id', '=', 'products.id')
                          ->select('comments.*', 'users.name as user_name', 'products.name as product_name')
                          ->orderBy('comments.created_at', 'desc')
                          ->get();

        return view('front.shop.reviews', compact('comments'));
    }

    public function destroy($id)
    {
        try {
            $comment = Comment::findOrFail($id);
            
            // Kiểm tra xem người dùng có quyền xóa comment không
            if (Auth::id() !== $comment->user_id && !Auth::user()->is_admin) {
                return redirect()->back()->with('error', 'Bạn không có quyền xóa đánh giá này!');
            }

            $comment->delete();
            return redirect()->back()->with('success', 'Đã xóa đánh giá thành công!');

        } catch (\Exception $e) {
            Log::error('Delete Comment Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa đánh giá!');
        }
    }
} 