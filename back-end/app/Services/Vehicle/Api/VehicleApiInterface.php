<?php

namespace App\Services\Vehicle\Api;


interface VehicleApiInterface
{
    const POST = 'post';
    const GET = 'get';
    function getDataFromApi(string $method = self::GET, string $uri = null, array $params = []): array;
    function filterBrands(): array;
    function getCarBrandsWithModels(): array;
}
