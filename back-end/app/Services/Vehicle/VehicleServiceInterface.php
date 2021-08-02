<?php

namespace App\Services\Vehicle;


interface VehicleServiceInterface
{
    function getCarBrandsWithModels();
    function updateOrCreateFromAPI(): void;
}
