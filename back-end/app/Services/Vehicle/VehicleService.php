<?php

namespace App\Services\Vehicle;

use App\Repositories\VehicleRepository;
use App\Services\Crud\CrudServiceAbstract;
use App\Services\Crud\CrudServiceInterface;
use App\Repositories\VehicleTypeRepository;
use App\Repositories\VehicleBrandRepository;
use App\Repositories\VehicleModelRepository;
use App\Services\Vehicle\Api\VehicleFipeService;


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
    /**
     * Update or create, Types,Model's versions.
     * Source is API FIPE
     * @return void
     */
    public function updateOrCreateFromAPI(): void
    {
        $vehicleTypes = new VehicleTypeRepository();
        $vehicleBrands = new VehicleBrandRepository();
        $vehicleModels = new VehicleModelRepository();
        $fipeServices = new VehicleFipeService();

        // Insert Brands
        $vehicleTypes->typesOfFipe()->each(function ($type) use ($fipeServices, $vehicleBrands, $vehicleModels) {
            //Get Brands By API
            $brands = $fipeServices->getBrandsByType($type->cod_fipe);
            array_walk($brands, function ($brand) use ($type, $vehicleBrands, $fipeServices, $vehicleModels) {
                //Check model exists and then update if necessary 
                $brand['vehicle_type_id'] = $type->id;
                $brandModel = $vehicleBrands->updateOrCreate($brand);
                //Get versions from API
                $models = $fipeServices->getModels($type->id, $brand['cod_fipe']);
                $hasModel = null;
                array_walk($models, function ($model) use ($vehicleModels, $brandModel, &$hasModel) {

                    //get name of model
                    $modelFromApi = $this->exceptionListModelVersion($model['Label']);
                    //check this model exist in database if not create a new
                    $hasModel = $vehicleModels->getModelByLabel($modelFromApi);


                    //Insert Or Update a version
                    if (!$hasModel || $modelFromApi !== @$hasModel->label) {
                        //Insert Version
                        $hasModel = $vehicleModels->updateOrCreate([
                            'label' => $modelFromApi,
                            'vehicle_brand_id' => $brandModel->id
                        ]);
                    }

                    $vehicleModels->insertVersionByModel($hasModel, [
                        'label' => $model['Label'],
                        'cod_fipe' => $model['Value']
                    ]);
                });
            }, $brands);
        });
    }
    /**
     * Check version is in exception list
     * @return string
     */
    private function exceptionListModelVersion(string $version): string
    {
        $list = [
            'Grand Siena' => 'Siena',
            'Grand Saveiro' => 'Saveiro',
            'Grand Vitara' => 'Vitara',
            'Grand C4' => 'C4',
            'Grand Caravan' => 'Caravan',
            'Grand Cherokee' => 'Cherokee',
            'Grand Carnival' => 'Carnival '
        ];
        foreach ($list as $value => $key) {
            if (str_contains($version, $value)) {
                return $key;
            }
        }
        return strtok($version, " ");
    }
}
