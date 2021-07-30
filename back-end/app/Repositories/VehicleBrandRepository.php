<?php

namespace App\Repositories;

use App\Models\VehicleBrand;
use App\Repositories\CrudRepositoryAbstract;

class VehicleBrandRepository extends CrudRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(VehicleBrand::class);
    }
}
