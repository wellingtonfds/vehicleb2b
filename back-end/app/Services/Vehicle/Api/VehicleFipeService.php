<?php

namespace App\Services\Vehicle\Api;

use App\Services\Vehicle\Api\VehicleApiInterface;
use Exception;
use Illuminate\Support\Facades\Http;

class VehicleFipeService implements VehicleApiInterface
{
    private array $data;
    public function getDataFromApi(string $method = VehicleApiInterface::POST, string $uri = null, array $params = []): array
    {
        $response = Http::post(env('API_FIPE') . $uri, $params);
        if ($response->failed()) {
            throw new Exception('Error api FIPE ' . $response->status());
        }
        return $response->json();
    }
    /**
     * 
     */
    public function getBrandsByType(int $type)
    {
        $types =  $this->getDataFromApi(
            VehicleApiInterface::POST,
            'ConsultarMarcas',
            [
                'codigoTipoVeiculo' => $type,
                'codigoTabelaReferencia' => 265
            ]
        );
        return array_map(function ($type) {
            return ['label' => $type['Label'], 'cod_fipe' => $type['Value']];
        }, $types);
    }
    public function getModels(int $type, int $brand): array
    {
        $models =  $this->getDataFromApi(
            VehicleApiInterface::POST,
            'ConsultarModelos',
            [
                'codigoTipoVeiculo' => $type,
                'codigoMarca' => $brand,
                'codigoTabelaReferencia' => 265
            ]
        );
        return $models['Modelos'];
    }

    public function filterBrands(): array
    {
        $params = [
            'codigoTipoVeiculo' => 1,
            'codigoTabelaReferencia' => 265
        ];
        return $this->getDataFromApi(VehicleApiInterface::POST, 'ConsultarMarcas', $params);
    }

    public function filterModelVersionByBrandId(int $brand): array
    {
        $params = [
            'codigoTipoVeiculo' => 1,
            'codigoTabelaReferencia' => 265,
            'codigoMarca' => $brand
        ];
        return $this->getDataFromApi(VehicleApiInterface::POST, 'ConsultarModelos', $params);
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
