<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationCollectionResource;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use App\Services\Location\LocationService;

class LocationsController extends Controller
{
    public $model = Location::class;
    public $resource = LocationResource::class;
    public $resourceCollection = LocationCollectionResource::class;
    public $service = LocationService::class;

    public function __construct(LocationService $locationService)
    {
        $this->service = $locationService;
    }
}
