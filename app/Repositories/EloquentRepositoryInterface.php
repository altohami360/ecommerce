<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
    /**
     * @param array $columns
     * @param array $relations
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function all(
        array $columns = ['*'],
        array $relations = [],
        string $orderBy = 'id',
        string $sortBy = 'asc'
    );

    /**
     * @param string $column
     * @param string $q
     * 
     * @return mixed
     */
    public function search(
        string $column,
        string $searchTerm,
        array $relations = []
    );

    /**
     * @param int $id
     * @return mixed
     */
    public function findOneById(
        int $id
    );

    /**
     * @param int $id
     * @param array $relations
     * @return mixed
     */
    public function findByIdWith(
        int $id,
        array $relations = ['*']
    );

    /**
     * @param array $attribute
     * @return Model
     */
    public function create(array $attributes): ?Model;

    /**
     * @param int $id
     * @param array $attributes
     * @return bool
     */
    public function update(int $id, array $attributes): bool;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;


    /**
     * @return int
     */
    public function count(): int;
}
