<?php

use App\Http\Controllers\VehicleController;
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


Route::get('vehicle', [VehicleController::class, 'index']);
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
Route::apiResource('vehicle', \App\Http\Controllers\VehicleController::class);
Route::apiResource('car/model/version', \App\Http\Controllers\CarModelVersionController::class);
Route::apiResource('car/model', \App\Http\Controllers\CarModelController::class);
Route::apiResource('car', \App\Http\Controllers\CarController::class);
