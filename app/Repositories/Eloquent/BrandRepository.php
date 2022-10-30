<?php

namespace App\Repositories\Eloquent;

use App\Models\Brand;
use App\Repositories\BrandRepositoryInterface;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface {

    protected $model;

    public function __construct(Brand $model)
    {
        $this->model = $model;
    }
}