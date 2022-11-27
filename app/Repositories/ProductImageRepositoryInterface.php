<?php

namespace App\Repositories;

interface ProductImageRepositoryInterface extends EloquentRepositoryInterface
{

    public function getByforeignId($param, $id);

}
