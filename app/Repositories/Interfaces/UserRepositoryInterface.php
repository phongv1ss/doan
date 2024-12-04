<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserRepositoryInterface
 * @package App\Repositories\Interfaces
 */

 interface UserRepositoryInterface
 {
     public function getAllPaginate();
     public function create(array $payload = []);
     public function findById(
        int $modelId,
        array $columns = ['*'],
        array $relations = []
    ) ;
     public function update(int $id = 0, array $payload = []);
     public function delete(int $id = 0);
     public function pagination(array $column = ['*'], array $condition = [], array $join = [], int $perPage = 20);
     public function dangky(array $payload = []);

 }
