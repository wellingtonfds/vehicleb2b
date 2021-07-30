<?php

namespace App\Services\Vehicle\Model;

use App\Repositories\VehicleModelRepository;
use App\Services\Crud\CrudServiceAbstract;
use App\Services\Crud\CrudServiceInterface;

class VehicleModelService extends CrudServiceAbstract implements VehicleModelServiceInterface, CrudServiceInterface
{
    public function __construct()
    {
        parent::__construct(new VehicleModelRepository());
    }
}
