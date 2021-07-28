<?php

namespace App\Services\Vehicle;

use App\Repositories\VehicleRepository;
use App\Services\Crud\CrudServiceAbstract;
use App\Services\Crud\CrudServiceInterface;
use App\Services\Vehicle\Api\VehicleApiInterface;

class VehicleService extends CrudServiceAbstract implements VehicleServiceInterface, CrudServiceInterface
{
    private VehicleApiInterface $service;
    public function __construct(VehicleApiInterface $service)
    {
        $this->service = $service;
        parent::__construct(new VehicleRepository());
    }

    public function getCarBrands()
    {
        return $this->service->filterBrands();
    }

    public function getCarBrandsWithModels()
    {
        return $this->service->getCarBrandsWithModels();
    }
}
