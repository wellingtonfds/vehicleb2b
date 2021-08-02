<?php

namespace App\Repositories;

use App\Models\VehicleVersion;
use App\Repositories\CrudRepositoryAbstract;

class VehicleVersionRepository extends CrudRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(VehicleVersion::class);
    }
}
