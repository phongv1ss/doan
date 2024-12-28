<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index()
    {
        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->join('products', 'comments.product_id', '=', 'products.id')
            ->select('comments.*', 'users.name as user_name', 'products.name as product_name')
            ->orderBy('comments.created_at', 'desc')
            ->paginate(10);

        return view('backend.review.index', compact('comments'));
    }

    public function danhgia()
    {
        $products = Product::select('id', 'name')->get();
        return view('front.shop.danhgia', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'comment' => 'required|min:10'
        ]);

        if (!Auth::check()) {
            return redirect()->route('auth.login')->with('error', 'Vui lòng đăng nhập để đánh giá');
        }

        try {
            Comment::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'comment' => $request->comment
            ]);

            return redirect()->back()->with('success', 'Đã gửi đánh giá thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }

    public function destroy($id)
    {
        try {
            $comment = Comment::findOrFail($id);
            
            if (Auth::id() !== $comment->user_id && !Auth::user()->is_admin) {
                return redirect()->back()->with('error', 'Bạn không có quyền xóa đánh giá này!');
            }

            $comment->delete();
            return redirect()->back()->with('success', 'Đã xóa đánh giá thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa đánh giá!');
        }
    }
} 