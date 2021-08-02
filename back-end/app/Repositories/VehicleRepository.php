<?php

namespace App\Repositories;

use App\Models\Vehicle;
use App\Repositories\CrudRepositoryAbstract;


class VehicleRepository extends CrudRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(Vehicle::class);
    }
}
