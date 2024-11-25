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
                $credential =[
                    'email'=>$request->input('email'),
                   'password' =>$request->input('password'),
                ];
     
                if (Auth::attempt($credential)) {
                    // toastr()->success('dang nhap thanh cong');
                    // flash()->success('dang nhap thanh cong');
                    return redirect()->route('dashboard.index')->with('demo', 'Đăng nhập thành công');
                }
                return redirect()->route('auth.admin')->with('saitt', 'Email hoặc mật khẩu không chính xác');

    
}
public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('auth.admin');

}


}




?>