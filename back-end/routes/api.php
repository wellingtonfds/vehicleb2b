<?php

use App\Http\Controllers\CarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/', function () {
    return "oi";
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

require __DIR__ . '/auth.php';

Route::get('states/ibge', [\App\Http\Controllers\StatesController::class, 'getFromIBGE']);
Route::get('cities/ibge', [\App\Http\Controllers\CitiesController::class, 'getFromIBGE']);

Route::middleware('auth:api')->group(function () {
    require __DIR__ . '/api/locations.php';

    Route::apiResource('locations', \App\Http\Controllers\LocationsController::class);
});

