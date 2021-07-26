<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationCollectionResource;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use App\Services\Locations\LocationService;
use App\Services\Locations\LocationServices;

class LocationsController extends Controller
{
    public $model = Location::class;
    public $resource = LocationResource::class;
    public $resourceCollection = LocationCollectionResource::class;
    public $services = LocationService::class;
    public $fillableFields = ['name', 'street', 'number', 'zip_code', 'complement', 'city_id'];

    public function __construct(LocationServices $locationServices)
    {
        $this->services = $locationServices;
    }
}
