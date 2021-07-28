<?php

namespace App\Services\Vehicle\Api;


interface VehicleApiInterface
{
    function getDataFromApi(): array;
    function filterBrands(): array;
    function getCarBrandsWithModels(): array;
}
