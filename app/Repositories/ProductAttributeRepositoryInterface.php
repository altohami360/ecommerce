<?php

namespace App\Repositories;

interface ProductAttributeRepositoryInterface extends EloquentRepositoryInterface
{
    public function getByforeignId($param, $id, $relations = ['']);
}
