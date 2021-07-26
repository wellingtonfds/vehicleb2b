<?php

namespace App\Services\Crud;

use App\Repository\RepositoryInterface;
use CrudServiceInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

abstract class CrudServiceAbstract implements CrudServiceInterface
{
    private $repository;
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(Model $model): Model
    {
        return $this->repository->create($model);
    }
    public function update(Model $model, array $data): Model
    {
        return $this->repository->update($model, $data);
    }
    public function delete(Model $model): Model
    {
        return $this->repository->delete($model);
    }
    public function find(int $id): Model
    {
        return $this->repository->find($id);
    }
    public function all(): Paginator
    {
        return $this->repository->all();
    }
}
