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
    public function getDataFromApi(): array
    {
        $response = Http::get(env('API_OLX'));

        return $response->json();
    }

    public function filterBrands(): array
    {
        $carBrands = array_values(array_filter($this->data, fn ($x) => $x['id'] === 'carbrand'));
        $carBrands = array_map(function ($carBrand) {
            return $carBrand['label'];
        }, $carBrands[0]['values_list']);
        return $carBrands;
    }

    public function getCarBrandsWithModels(): array
    {
        $carBrands = array_values(array_filter($this->data, fn ($x) => $x['id'] === 'carbrand'));
        $carBrands = array_map(function ($carBrand) {
            dd($carBrand);

            C6 EXCLUSIVE 3.0 V6 24V 215CV AUT.
            C6 Exclusive 3.0 V6 24V 215cv Aut.
            return [
                'label' => $carBrand['label'],
                'values' => $carBrand['values'],
            ];
        }, $carBrands[0]['values_list']);
        return $carBrands;
    }
}
