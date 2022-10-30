<?php

namespace App\Repositories\Eloquent;

use App\Models\Attribute;
use App\Repositories\AttributeRepositoryInterface;

class AttributeRepository extends BaseRepository implements AttributeRepositoryInterface {


    protected $model;

    public function __construct(Attribute $model)
    {
        $this->model = $model;
    }
}