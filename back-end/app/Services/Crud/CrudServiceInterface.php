<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

interface CrudServiceInterface
{
    public function create(Model $model): Model;
    public function update(Model $model, array $data): Model;
    public function delete(Model $model): Model;
    public function find(int $id): Model;
    public function all(): Paginator;
}
