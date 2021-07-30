<?php

namespace App\Services\Vehicle\Type;

use App\Repositories\VehicleTypeRepository;
use App\Services\Crud\CrudServiceAbstract;
use App\Services\Crud\CrudServiceInterface;

class VehicleTypeService extends CrudServiceAbstract implements VehicleTypeServiceInterface, CrudServiceInterface
{
    public function __construct()
    {
        parent::__construct(new VehicleTypeRepository());
    }
}
