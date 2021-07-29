<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StatesController extends Controller
{
    public function getFromIBGE()
    {
        $states = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados')->json();

        foreach ($states as $stateJson) {
            if (!State::query()->where('id', $stateJson['id'])->exists()) {
                $state = new State();
                $state->id = $stateJson['id'];
                $state->uf = $stateJson['sigla'];
                $state->name = $stateJson['nome'];
                $state->save();
            }
        }

        $alLStates = State::all();

        return new JsonResponse($alLStates, JsonResponse::HTTP_OK);
    }
}
