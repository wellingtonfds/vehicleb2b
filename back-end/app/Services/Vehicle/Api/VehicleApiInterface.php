<?php

namespace App\Services\Vehicle\Api;

use Exception;

interface VehicleApiInterface
{
    const POST = 'post';
    const GET = 'get';
    function filterBrands(): array;
    function getCarBrandsWithModels(): array;
    function getModels(int $type, int $brand): array;
    function filterModelVersionByBrandId(int $brand): array;
    function getDataFromApi(string $method = self::GET, string $uri = null, array $params = []): array;
}
