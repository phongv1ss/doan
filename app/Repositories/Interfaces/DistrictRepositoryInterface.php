<?php

namespace App\Repositories\Interfaces;

/**
 * Interface DistrictRepositoryInterface
 * @package App\Repositories\Interfaces
 */

 interface DistrictRepositoryInterface
 {
    public function all();
    public function findDistrictByProvinceId(int $province_id);
    public function findById(int $id, array $columns = ['*'], array $relations = []);

 }
