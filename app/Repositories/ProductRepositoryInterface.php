<?php

namespace App\Repositories;


interface ProductRepositoryInterface extends EloquentRepositoryInterface
{
    
    public function allWithAttribute(
        array $columns = ['*'],
        array $relations = [],
        string $orderBy = 'id',
        string $sortBy = 'asc'
    );

}
