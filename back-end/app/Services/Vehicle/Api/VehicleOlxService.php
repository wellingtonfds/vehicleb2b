<?php

namespace App\Services\Vehicle\Api;

use App\Services\Vehicle\Api\VehicleApiInterface;
use Illuminate\Support\Facades\Http;

class VehicleOlxService implements VehicleApiInterface
{
    private array $data;
    public function __construct()
    {
        $this->data = $this->getDataFromApi();
    }
    public function getDataFromApi(string $method = VehicleApiInterface::GET, string $uri = null, array $params = []): array
    {
        $response = Http::get(env('API_OLX'));

        return $response->json();
    }

    public function filterBrands(): array
    {

        $carBrands = array_values(array_filter($this->data, fn ($x) => $x['id'] === 'carbrand'));
        $carBrands = array_map(function ($carBrand) {
            $re = '/^([A-Z]+\s?\-?\s)([A-Z]+)/m';
            $matches = [];
            preg_match($re, $carBrand['label'], $matches);
            if ($matches) {
                return $matches[1] . ucfirst(strtolower($matches[2]));
            }
            return ucfirst(strtolower($carBrand['label']));
        }, $carBrands[0]['values_list']);
        return $carBrands;
    }

    public function getCarBrandsWithModels(): array
    {
        $carBrands = array_values(array_filter($this->data, fn ($x) => $x['id'] === 'carbrand'));
        $carBrands = array_map(function ($carBrand) {

            return [
                'label' => $carBrand['label'],
                'values' => $carBrand['values'],
            ];
        }, $carBrands[0]['values_list']);
        return $carBrands;
    }
}
