<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarBrandResource;
use App\Http\Resources\LocationCollectionResource;
use App\Models\CarBrand;
use App\Services\Car\CarService;

class CarController extends Controller
{

    public $model = CarBrand::class;
    public $resource = CarBrandResource::class;
    public $resourceCollection = LocationCollectionResource::class;
    public $service = CarService::class;

    public function __construct(CarService $carService)
    {
        $this->service = $carService;
    }
}
