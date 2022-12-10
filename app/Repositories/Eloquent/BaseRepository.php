<?php

namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 *
 * @package \App\Repositories
 */
class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

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
    ) {
        return $this->model->with($relations)->get($columns)->sortBy($sortBy);
    }

    /**
     * @param string $column
     * @param string $q
     * 
     * @return mixed
     */
    public function search($column, $searchTerm) {
        return $this->model->where($column, 'like', "%{$searchTerm}%")->get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findOneById(
        int $id
    ) {
        return $this->model->findOrFail($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findById(
        int $id
    ) {
        return $this->model->whereId($id)->get();
    }

    /**
     * @param array $attribute
     * @return Model
     */
    public function create(array $attributes): ?Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return bool
     */
    public function update(int $id, array $attributes): bool
    {
        return $this->model->find($id)->update($attributes);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model->find($id)->delete();
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return $this->model->count();
    }
}
