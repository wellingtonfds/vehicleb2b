<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Services\Car\CarService;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class CarController extends Controller
{

    public function index(CarService $carService): Paginator
    {
        return $carService->all();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CarService $carService, Car $car): Car
    {
        $car->fill($request->all());
        return $carService->create($car);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(int $car, CarService $carService): Car
    {
        return $carService->find($car);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car, CarService $carService): Car
    {
        return $carService->update($car, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car,  CarService $carService): Car
    {
        return $carService->delete($car);
    }
}
