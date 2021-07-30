<?php

namespace App\Services\Vehicle;

use App\Repositories\CarBrandRepository;
use App\Repositories\VehicleRepository;
use App\Services\Crud\CrudServiceAbstract;
use App\Services\Crud\CrudServiceInterface;
use App\Services\Vehicle\Api\VehicleApiInterface;
use App\Services\Vehicle\Api\VehicleApiProxyInterface;
use App\Services\Vehicle\Api\VehicleFipeService;
use App\Services\Vehicle\Api\VehicleOlxService;

class VehicleService extends CrudServiceAbstract implements VehicleServiceInterface, CrudServiceInterface
{
    public function __construct()
    {
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

    public function init()
    {

        $fipeServices = new VehicleFipeService();
        $brands = $fipeServices->filterBrands();
        $carBrandRepository = new CarBrandRepository();

        // $olxService = new VehicleOlxService();
        // $brands = $olxService->filterBrands();
        // foreach ($brands as $brand) {
        // }
        array_walk($brands, function ($brand) use ($carBrandRepository) {
            $carBrandRepository->updateOfCreate([
                'label' => $brand['Label'],
                'cod_fipe' => $brand['Value']
            ]);
        });
    }
}
