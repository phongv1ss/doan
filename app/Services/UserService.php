<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Repositories\BaseRepositoryI;
use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;

/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{ 
    
    protected $userRepository;
    
    public function __construct(UserRepository $userRepository){
        
     $this->userRepository = $userRepository;
    }
    private function paginateSelect(){
        return [
            'id',
            'email',
            'phone',
            'address',
            'name',
            'publish',
        ];
    }
    public function paginate($request)
{
    // Lấy keyword từ request
    $condition['keyword'] = addslashes($request->input('keyword', ''));

    // Cột cần hiển thị
    $columns = $this->paginateSelect();

    // Gọi repository để lấy dữ liệu
    return $this->userRepository->pagination($columns, $condition);
}

    public function create($request) {
        DB::beginTransaction();
        try{
            $payload = $request->except(['_token','send','re_password']);
            $payload['birthday'] = $this->converBirthday($payload['birthday']);
            $payload['password'] = Hash::make($payload['password']);
            $user=$this->userRepository->create($payload);


            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            echo $e->getMessage();die();
            return false;
        }
    }
     
    public function update($id,$request) {
        DB::beginTransaction();
        try{
  
            $payload = $request->except(['_token','send','re_password']);
            $payload['birthday'] = $this->converBirthday($payload['birthday']);
            $user=$this->userRepository->update($id,$payload);
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            echo $e->getMessage();die();
            return false;
        }
    }


    private function converBirthday($birthday= ''){
        $carbonDate= Carbon::createFromFormat('Y-m-d',$birthday);
        $birthday = $carbonDate->format('Y-m-d H:i:s');
        return $birthday;
        
    }
    public function destroy($id){
        DB::beginTransaction();
        try{
            $user=$this->userRepository->delete($id);
           
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            echo $e->getMessage();die();
            return false;
        }
    }
    public function updateStatus($post = [])
    {
        DB::beginTransaction();
        try {
            
            $payload = [
                $post['field'] => ($post['value'] == 1) ? 0 : 1,
            ];
    
      
            $user = $this->userRepository->update($post['modelId'], $payload);
    
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
    
}
