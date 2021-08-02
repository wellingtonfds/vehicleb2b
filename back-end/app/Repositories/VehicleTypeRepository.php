<?php

namespace App\Repositories;

use App\Models\VehicleBrand;
use App\Models\VehicleType;
use App\Repositories\CrudRepositoryAbstract;
use Illuminate\Database\Eloquent\Collection;

class VehicleTypeRepository extends CrudRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(VehicleType::class);
    }

    public function typesOfFipe(): Collection
    {
        return $this->model->whereNotNull('cod_fipe')->get();
    }
}
