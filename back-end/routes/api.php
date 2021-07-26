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


Route::resource('cars', CarController::class);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

require __DIR__ . '/auth.php';

Route::apiResource('locations', \App\Http\Controllers\LocationsController::class);