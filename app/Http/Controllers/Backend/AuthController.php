<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Flasher\Laravel\Facade\Flasher;
use App\Http\Requests\StoreUserRequest;
class AuthController extends Controller
{
public function __construct() {
    
}
public function index() {
 
     return view('backend.auth.login');     
    }


    

    public function login(AuthRequest $request) {
        $credential = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
    
        if (Auth::attempt($credential)) { 
            $user = Auth::user(); // Lấy thông tin người dùng đã đăng nhập
    
            if ($user->publish === 1) {
                // Nếu là quản trị viên
                return redirect()->route('dashboard.index')->with('demo', 'Đăng nhập Thành Công !!!');
            } else {
                // Nếu là thành viên
                return redirect()->route('shop.index')->with('demo', 'Đăng nhập Thành Công !!!');
            }
        }
    
        return redirect()->route('auth.admin')->with('saitt', 'Email hoặc mật khẩu không chính xác');
    }
    
public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('auth.admin');

}
public function showLoginForm()
{
    return view('backend.auth.login');
}



}




?>