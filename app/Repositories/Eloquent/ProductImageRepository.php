<?php

namespace App\Repositories\Eloquent;

use App\Models\ProductImage;
use App\Repositories\ProductImageRepositoryInterface;

class ProductImageRepository extends BaseRepository implements ProductImageRepositoryInterface
{
    protected $model;

    public function __construct(ProductImage $model)
    {
        $this->model = $model;
    }

    public function getByforeignId($param, $id)
    {
        return $this->model->where($param, $id)->get();
    }
}
