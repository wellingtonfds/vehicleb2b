<?php

namespace App\Repository\Crud;

use App\Repository\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

abstract class CrudRepositoryAbstract implements RepositoryInterface
{
    private Model $model;
    public function __construct($modelName)
    {
        $this->model = new $modelName;
    }
    public function create(Model $model): Model
    {
        $model->save();
        return $model;
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
    public function all(): Paginator
    {
        return $this->model->get()->paginate(15);
    }
}
