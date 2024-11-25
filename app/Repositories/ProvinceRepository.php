<?php

namespace App\Repositories;
use App\Models\Province;
use App\Repositories\Interfaces\ProvinceRepositoryInterface;
use App\Repositories\BaseRepository;


/**
 * Class ProvinceRepository
 * @package App\Repositories
 */
class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{
   
  public function __construct(Province $model)
  {
      parent::__construct($model);
  }
}
