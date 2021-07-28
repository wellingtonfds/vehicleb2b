<?php

namespace App\Http\Controllers;

use App\Services\Vehicle\Api\VehicleOlxService;
use App\Services\Vehicle\VehicleService;

class VehicleController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = new VehicleService(new VehicleOlxService());
        dd($service->getCarBrandsWithModels());
    }
}
