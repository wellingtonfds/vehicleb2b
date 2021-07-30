<?php

namespace App\Services\Crud;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class CrudServiceAbstract implements CrudServiceInterface
{
    private $repository;
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function create(array $model): Model
    {
        return $this->repository->create($model);
    }
    public function update(int $model, array $data): Model
    {
        $model = $this->repository->find($model);
        return $this->repository->update($model, $data);
    }
    public function delete(int $model): Model
    {
        $model = $this->repository->find($model);
        return $this->repository->delete($model);
    }
    public function find(int $id): Model
    {
        return $this->repository->find($id);
    }
    public function all(): LengthAwarePaginator
    {
        return $this->repository->all();
    }
}
