<?php

namespace App\Services\Location;

use App\Repositories\LocationRepository;
use App\Services\Crud\CrudServiceAbstract;
use App\Services\Crud\CrudServiceInterface;

class LocationService extends CrudServiceAbstract implements LocationServiceInterface, CrudServiceInterface
{
    public function __construct()
    {
        parent::__construct(new LocationRepository());
    }
}
