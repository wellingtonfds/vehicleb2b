<?php

namespace App\Services\Locations;

use App\Repositories\LocationRepository;
use App\Services\Crud\CrudServiceAbstract;
use App\Services\Crud\CrudServiceInterface;

class LocationServices extends CrudServiceAbstract implements LocationServicesInterface, CrudServiceInterface
{
    public function __construct()
    {
        parent::__construct(new LocationRepository());
    }
}
