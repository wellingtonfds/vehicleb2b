<?php

namespace App\Repositories;

use App\Models\CarBrand;
use App\Repositories\CrudRepositoryAbstract;


class CarBrandRepository extends CrudRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(CarBrand::class);
    }

    public function insertModelsAndVersionsByBrand(array $data)
    {
        array_walk($data, function ($brandData) {
            $brand = CarBrand::where('label', $brandData['brand'])->first();
            if (!$brand) {
                $brand = CarBrand::updateOrCreate(['label' => $brandData['brand']]);
            }
            array_walk($brandData['models'], function ($models) use ($brand) {
                $model = $brand->carModels()->updateOrCreate(['label' => $models['label']]);
                array_walk($models['values'], function ($version) use ($model) {
                    $model->carModelVersions()->updateOrCreate(['label' => $version['label']]);
                });
            });
        });
    }
}
