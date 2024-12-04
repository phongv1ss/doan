<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getAllPaginate()
    {
        return $this->model->paginate(10);
    }
    
    public function pagination(
        array $column = ['*'],
        array $condition = [],
        array $join = [],
        int $perPage = 20
    ) {
        $query = $this->model->select($column);
    
        
        if (!empty($condition['keyword'])) {
            $query->where('name', 'LIKE', '%' . $condition['keyword'] . '%')
            ->orWhere('email', 'LIKE', '%' . $condition['keyword'] . '%')
            ->orWhere('address', 'LIKE', '%' . $condition['keyword'] . '%')
            ->orWhere('phone', 'LIKE', '%' . $condition['keyword'] . '%') ;
        }
        if (isset($condition['publish']) && !empty($condition['publish']) && $condition['publish'] != -1) {
            $query->where('publish', '=', $condition['publish']);
        }
        
       
        $results = $query->paginate(10); 
        
        return $results;
        
        
        if (!empty($join)) {
            $query->join(...$join);
        }
    
        return $query->paginate($perPage);
    }
}
