<?php

namespace App\Repositories;

use App\Models\VehicleBrand;
use App\Models\VehicleType;
use App\Repositories\CrudRepositoryAbstract;


class VehicleTypeRepository extends CrudRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(VehicleType::class);
    }
}
