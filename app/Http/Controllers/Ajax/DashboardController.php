<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\Interfaces\UserService as userService;

class DashboardController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function changeStatus(Request $request)
    {
        $post = $request->input();

     
        $serviceClass = '\App\Services\\' . ucfirst($post['model']) . 'Service';

        if (class_exists($serviceClass)) {
            $serviceInstance = app($serviceClass);
        }
            $flag = $serviceInstance->updateStatus($post);
            return response()->json(['flag' => $flag]);
       
    }
}