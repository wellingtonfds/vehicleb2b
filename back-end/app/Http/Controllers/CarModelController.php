<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Services\Car\Model\CarModelService;
use App\Http\Resources\CarModelResource;
use App\Http\Resources\LocationCollectionResource;

class CarModelController extends Controller
{
    public $model = CarModel::class;
    public $resource = CarModelResource::class;
    public $resourceCollection = LocationCollectionResource::class;
    public $service = CarModelService::class;

    public function __construct(CarModelService $service)
    {
        $this->service = $service;
    }
}
