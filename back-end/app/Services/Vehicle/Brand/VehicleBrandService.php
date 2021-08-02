<?php

namespace App\Services\Vehicle\Brand;

use App\Repositories\VehicleBrandRepository;
use App\Services\Crud\CrudServiceAbstract;
use App\Services\Crud\CrudServiceInterface;

class VehicleBrandService extends CrudServiceAbstract implements VehicleBrandServiceInterface, CrudServiceInterface
{
    public function __construct()
    {
        parent::__construct(new VehicleBrandRepository());
    }
}
