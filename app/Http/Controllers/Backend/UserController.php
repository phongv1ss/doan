<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;

class UserController 
{
    protected $userService;
    protected $provinceRepository;
    protected $userRepository;

    public function __construct(
        UserService $userService,
        ProvinceRepository $provinceRepository,
        UserRepository $userRepository
        ){
    $this->userService =$userService;
    $this->provinceRepository =$provinceRepository;
    $this->userRepository =$userRepository;
        }

    public function index(Request $request) {
        $users = $this->userService->paginate($request);
        $totalOrders = Order::where('status', 'completed')->count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();  
        $config =  [
            'js' =>[
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'css' =>[
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ]
        ];
        $config['seo']= config('apps.user');  
        $template ='backend.user.index';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'users', 
            'totalOrders',
            'orders',
        ));
    }
    public function create(){

        $totalOrders = Order::where('status', 'completed')->count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();   

        $provinces= $this->provinceRepository->all();
        $config['seo'] = config('apps.user');
        $config['css'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
        ];
        $config['js'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            'backend/library/location.js'
        ];
        $config['method']= 'create';
        $template ='backend.user.create';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'provinces',
            'totalOrders',
            'orders',
        ));
    }
    public function store(StoreUserRequest $request){
        if($this->userService->create($request)){
            return redirect()->route('user.index')->with('demo', 'Thêm thành công');

        }
        return redirect()->route('user.index')->with('saitt', 'Thêm không thành công');

    }


    public function edit($id) {
        $totalOrders = Order::where('status', 'completed')->count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();   
        $user = $this->userRepository->findById($id);
    
        $provinces = $this->provinceRepository->all();
        $config['seo'] = config('apps.user');
        $config['css'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
        ];
        $config['js'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            'backend/library/location.js'
        ];  
        $config['method']='edit';
    
        $template = 'backend.user.create';
        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'provinces',
            'user',
            'totalOrders',
            'orders',
        ));
    }
    public function update($id, UpdateUserRequest $request) {
        if($this->userService->update($id,$request)){
            return redirect()->route('user.index')->with('demo', 'Cập Nhật thành công');

        }
        return redirect()->route('user.index')->with('saitt', 'Cập Nhật không thành công');

    }


    public function delete($id){
        $totalOrders = Order::where('status', 'completed')->count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();   
        $config['seo'] = config('apps.user');
        $provinces = $this->provinceRepository->all();
        $user = $this->userRepository->findById($id);
        $template = 'backend.user.delete';
        return view('backend.dashboard.layout', compact(
            'template',
            'config',
            'provinces',
            'user',
            'totalOrders',
            'orders',
        ));
    }
    public function destroy($id){
        if($this->userService->destroy($id)){
            return redirect()->route('user.index')->with('demo', 'Xóa thành công !!!');

        }
        return redirect()->route('user.index')->with('saitt', 'Xóa không thành công !!!');

    }



    public function register(StoreUserRequest $request)
    {
        // Thêm người dùng thông qua UserService
        $user = $this->userService->dangky($request);
        // Kiểm tra kết quả và chuyển hướng
        if ($user) {
            return redirect()->route('user.dangky')->with('demo', 'Thêm thành công!');
        }
    
        return redirect()->route('user.dangky')->with('saitt', 'Thêm không thành công!');
    }
    

    public function dangky(){
        $totalOrders = Order::where('status', 'completed')->count();
        $orders = Order::orderBy('created_at', 'desc')->take(5)->get();   
        $provinces= $this->provinceRepository->all();
        $config['seo'] = config('apps.user');
        $config['css'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
        ];
        $config['js'] = [
            'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            'backend/library/location.js'
        ];
        $config['method']= 'dangky';
        $template ='backend.auth.dangky';
        return view('backend.auth.formdangky',compact(
            'template',
            'config',
            'provinces',
            'totalOrders',
            'orders',
        ));
    }
}



?>