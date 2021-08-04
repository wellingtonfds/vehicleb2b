<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Http\Resources\VehicleResource;
use App\Services\Vehicle\VehicleService;

class VehicleController extends Controller
{
    public $model = Vehicle::class;
    public $resource = VehicleResource::class;
    public $resourceCollection = LocationCollectionResource::class;
    public $service = VehicleService::class;

    public function __construct(VehicleService $service)
    {
        $this->service = $service;
    }
}
