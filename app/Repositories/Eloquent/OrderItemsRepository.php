<?php

namespace App\Repositories\Eloquent;

use App\Models\OrderItem;
use App\Repositories\OrderItemsRepositoryInterface;

class OrderItemsRepository extends BaseRepository implements OrderItemsRepositoryInterface
{
    protected $model;

    public function __construct(OrderItem $model)
    {
        $this->model = $model;
    }
}