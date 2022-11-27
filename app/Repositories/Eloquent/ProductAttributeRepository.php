<?php

namespace App\Repositories\Eloquent;

use App\Models\ProductAttribute;
use App\Repositories\ProductAttributeRepositoryInterface;

class ProductAttributeRepository extends BaseRepository implements ProductAttributeRepositoryInterface
{
    protected $model;

    public function __construct(ProductAttribute $model)
    {
        $this->model = $model;
    }

    public function getByforeignId($param, $id, $relations = [''])
    {
        return $this->model->with($relations)->where($param, $id)->get();
    }
}
