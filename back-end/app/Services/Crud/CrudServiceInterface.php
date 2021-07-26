<?php

namespace App\Services\Crud;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface CrudServiceInterface
{
    public function create(array $model): Model;
    public function update(int $model, array $data): Model;
    public function delete(int $model): Model;
    public function find(int $id): Model;
    public function all(): LengthAwarePaginator;
}
