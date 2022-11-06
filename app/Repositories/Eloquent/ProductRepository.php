<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

}
