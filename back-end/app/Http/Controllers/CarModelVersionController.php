<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarModelVersionResource;
use App\Models\CarModelVersion;
use App\Services\Car\Version\CarModelVersionService;

class CarModelVersionController extends Controller
{
    public $model = CarModelVersion::class;
    public $resource = CarModelVe::class;
    public $resourceCollection = CarModelVersionResource::class;
    public $service = CarModelVersionService::class;

    public function __construct(CarModelVersionService $service)
    {
        $this->service = $service;
    }
}
