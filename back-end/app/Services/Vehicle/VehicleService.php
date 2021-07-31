<?php

namespace App\Services\Vehicle;

use App\Models\VehicleType;
use App\Repositories\CarBrandRepository;
use App\Repositories\CarModelVersionRepository;
use App\Repositories\VehicleBrandRepository;
use App\Repositories\VehicleModelRepository;
use App\Repositories\VehicleRepository;
use App\Repositories\VehicleTypeRepository;
use App\Services\Crud\CrudServiceAbstract;
use App\Services\Crud\CrudServiceInterface;
use App\Services\Vehicle\Api\VehicleApiInterface;
use App\Services\Vehicle\Api\VehicleApiProxyInterface;
use App\Services\Vehicle\Api\VehicleFipeService;
use App\Services\Vehicle\Api\VehicleOlxService;
use Illuminate\Support\Arr;

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
        $vehicleTypes = new VehicleTypeRepository();
        $vehicleBrands = new VehicleBrandRepository();
        $vehicleModels = new VehicleModelRepository();
        $fipeServices = new VehicleFipeService();

        // Insert Brands
        $vehicleTypes->typesOfFipe()->each(function ($type) use ($fipeServices, $vehicleBrands, $vehicleModels) {
            $brands = $fipeServices->getBrandsByType($type->cod_fipe);
            array_walk($brands, function ($brand) use ($type, $vehicleBrands, $fipeServices, $vehicleModels) {
                $brand['vehicle_type_id'] = $type->id;
                $brandModel = $vehicleBrands->updateOrCreate($brand);
                // dd($brand);
                $models = $fipeServices->getModels($type->id, $brand['cod_fipe']);
                $hasModel = null;
                array_walk($models, function ($model) use ($vehicleModels, $brandModel, &$hasModel) {
                    $modelFromApi = strtok($model['Label'], " ");
                    $hasModel = $vehicleModels->getModelByLabel(strtok($model['Label'], " "));

                    if (!$hasModel || $modelFromApi !== @$hasModel->label) {
                        //Insert Version
                        $hasModel = $vehicleModels->updateOrCreate([
                            'label' => $modelFromApi,
                            'vehicle_brand_id' => $brandModel->id
                        ]);

                        dd($hasModel);
                    }

                    //Insert Version

                    dd($hasModel, 'Fim');
                    // preg_match('/\b\w+\b/i', $model['Label'], $result);
                    dd(strtok($model['Label'], " "));
                });
                dd($models);
                return $brand;
            }, $brands);
            // $vehicleBrands->updateOrCreateMany($brands);
        });
        // $brands = $fipeServices->filterBrands();
        // $carBrandRepository = new CarBrandRepository();


        // array_walk($brands, function ($brand) use ($carBrandRepository) {
        //     $carBrandRepository->updateOrCreate([
        //         'label' => $brand['Label'],
        //         'cod_fipe' => $brand['Value']
        //     ]);
        // });

        // $olxService = new VehicleOlxService();
        // $carBrandRepository->insertModelsAndVersionsByBrand($olxService->getCarBrandsWithModels());

        // $carModelVersionRepository = new CarModelVersionRepository();
        // $allBrands = $carBrandRepository->cursor();
        // $allBrands->each(function ($brand) use ($fipeServices, $carModelVersionRepository) {

        //     if ($brand->cod_fipe) {
        //         $allVersion = $fipeServices->filterModelVersionByBrandId($brand->cod_fipe);
        //         array_walk($allVersion['Modelos'], function ($model) use ($carModelVersionRepository) {
        //             $carModelVersion = $carModelVersionRepository->getModelVersionByLikeLabel($model['Label']);
        //             if ($carModelVersion) {
        //                 // dd($carModelVersion);
        //                 $carModelVersionRepository->update($carModelVersion, [
        //                     'label' => $model['Label'],
        //                     'cod_fipe' => $model['Value'],
        //                     'car_model_id' => $carModelVersion->car_model_id
        //                 ]);
        //                 // $carModelVersionRepository->updateOrCreate([
        //                 //     'label' => $model['Label'],
        //                 //     'cod_fipe' => $model['Value'],
        //                 //     'car_model_id' => $carModelVersion->car_model_id
        //                 // ]);
        //             } else {
        //                 dump($model['Label']);
        //             }
        //         });
        //     }
        // });
    }
}
