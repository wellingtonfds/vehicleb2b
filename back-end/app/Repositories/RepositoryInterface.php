<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

interface RepositoryInterface
{

    public function create(array $model): Model;
    public function update(Model $model, array $data): Model;
    public function updateOrCreate(array $data): Model;
    public function delete(Model $model): Model;
    public function find(int $id): Model;
    public function all(): LengthAwarePaginator;
}
