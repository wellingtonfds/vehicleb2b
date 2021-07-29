<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class CitiesController extends Controller
{
    public function getFromIBGE()
    {
        $states = State::all();

        foreach ($states as $state) {
            $cities = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados/'.$state->id.'/municipios')->json();

            foreach ($cities as $cityJson) {
                if (!State::query()->where('id', $cityJson['id'])->exists()) {
                    $city = new City();
                    $city->id = $cityJson['id'];
                    $city->state_id = $cityJson['microrregiao']['mesorregiao']['UF']['id'];
                    $city->name = $cityJson['nome'];
                    $city->save();
                }
            }
        }

        $alLCities = City::all();

        return new JsonResponse($alLCities, JsonResponse::HTTP_OK);
    }
}
