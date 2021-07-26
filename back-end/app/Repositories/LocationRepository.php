<?php

namespace App\Repositories;

use App\Models\Location;
use App\Repositories\CrudRepositoryAbstract;

class LocationRepository extends CrudRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(Location::class);
    }
}
