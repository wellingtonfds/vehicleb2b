<?php

namespace App\Services\Vehicle\Api;

use App\Services\Vehicle\Api\VehicleApiInterface;
use Illuminate\Support\Facades\Http;

class VehicleFipeService implements VehicleApiInterface
{
    private array $data;
    public function __construct()
    {
        // $this->data = $this->getDataFromApi('ConsultarMarcas');
    }
    // function getDataFromApi(string $method = self::GET, string $uri = null, array $params = []): array;
    public function getDataFromApi(string $method = VehicleApiInterface::POST, string $uri = null, array $params = []): array
    {
        // self::POST
        $response = Http::post(env('API_FIPE') . $uri, [
            'codigoTipoVeiculo' => 1,
            'codigoTabelaReferencia' => 265
        ]);

        // dd($response->json());

        return $response->json();
    }

    public function filterBrands(): array
    {
        $params = [
            'codigoTipoVeiculo' => 1,
            'codigoTabelaReferencia' => 265
        ];
        return $this->getDataFromApi(VehicleApiInterface::POST, 'ConsultarMarcas', $params);
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
