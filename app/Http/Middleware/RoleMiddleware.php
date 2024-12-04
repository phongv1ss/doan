<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('auth.login');
        }

        
        if ($role === 'admin' && $user->publish != 1) {
            return redirect()->route('shop.index'); // Thành viên -> trang bán hàng
        }

        if ($role === 'member' && $user->publish != 0) {
            return redirect()->route('dashboard.index'); // Admin -> dashboard
        }

        return $next($request); 
    }
}
