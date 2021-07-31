<?php

namespace App\Repositories;

use App\Models\VehicleModel;
use App\Repositories\CrudRepositoryAbstract;

class VehicleModelRepository extends CrudRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(VehicleModel::class);
    }

    public function getModelByLabel(string $label)
    {
        return $this->model->where('label', $label)->first();
    }
}
