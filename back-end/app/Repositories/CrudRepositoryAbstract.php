<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class CrudRepositoryAbstract implements RepositoryInterface
{
    private Model $model;
    public function __construct($modelName)
    {
        $this->model = new $modelName;
    }
    public function create(array $data): Model
    {
        return get_class($this->model)::create($data);
    }

    public function updateOrCreate(array $data): Model
    {
        return get_class($this->model)::updateOrCreate($data);
    }
    public function update(Model $model, array $data): Model
    {
        $model->fill($data);
        $model->save();
        return $model;
    }
    public function delete(Model $model): Model
    {
        $model->delete();
        return  $model;
    }
    public function find(int $id): Model
    {
        return $this->model->findOrFail($id);
    }
    public function all(): LengthAwarePaginator
    {
        return $this->model->paginate(15);
    }
}
