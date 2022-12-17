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
    public function search($column, $searchTerm, $relations = []) {
        return $this->model->with($relations)->where($column, 'like', "%{$searchTerm}%")->get();
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
     * @param array $relations
     * @return mixed
     */
    public function findByIdWith(
        int $id,
        array $relations = ['*']
    ) {
        return $this->model->with($relations)->whereId($id)->first();
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
