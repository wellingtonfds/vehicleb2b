<?php

namespace App\Services\Vehicle;

use App\Repositories\CarBrandRepository;
use App\Repositories\CarModelVersionRepository;
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

    public function updateCars()
    {

        $fipeServices = new VehicleFipeService();
        $brands = $fipeServices->filterBrands();
        $carBrandRepository = new CarBrandRepository();


        array_walk($brands, function ($brand) use ($carBrandRepository) {
            $carBrandRepository->updateOrCreate([
                'label' => $brand['Label'],
                'cod_fipe' => $brand['Value']
            ]);
        });

        $olxService = new VehicleOlxService();
        $carBrandRepository->insertModelsAndVersionsByBrand($olxService->getCarBrandsWithModels());

        $carModelVersionRepository = new CarModelVersionRepository();
        $allBrands = $carBrandRepository->cursor();
        $allBrands->each(function ($brand) use ($fipeServices, $carModelVersionRepository) {

            if ($brand->cod_fipe) {
                $allVersion = $fipeServices->filterModelVersionByBrandId($brand->cod_fipe);
                array_walk($allVersion['Modelos'], function ($model) use ($carModelVersionRepository) {
                    $carModelVersion = $carModelVersionRepository->getModelVersionByLikeLabel($model['Label']);
                    if ($carModelVersion) {
                        // dd($carModelVersion);
                        $carModelVersionRepository->update($carModelVersion, [
                            'label' => $model['Label'],
                            'cod_fipe' => $model['Value'],
                            'car_model_id' => $carModelVersion->car_model_id
                        ]);
                        // $carModelVersionRepository->updateOrCreate([
                        //     'label' => $model['Label'],
                        //     'cod_fipe' => $model['Value'],
                        //     'car_model_id' => $carModelVersion->car_model_id
                        // ]);
                    } else {
                        dump($model['Label']);
                    }
                });
            }
        });
    }
}
