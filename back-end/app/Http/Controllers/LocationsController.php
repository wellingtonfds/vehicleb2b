<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationCollectionResource;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();

        return new LocationCollectionResource($locations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $location = new Location();
            $location->fill($request->only(['name', 'street', 'number', 'zip_code', 'complement', 'city_id']));
            $location->saveOrFail();
        } catch (\Throwable $exception) {
            throw new UnprocessableEntityHttpException('Could not create location', $exception);
        }

        return new LocationResource($location);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return new LocationResource($location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        try {
            $location->fill($request->only(['name', 'street', 'number', 'zip_code', 'complement', 'city_id']));
            $location->saveOrFail();
        } catch (\Throwable $exception) {
            throw new UnprocessableEntityHttpException('Could not update location', $exception);
        }

        return new LocationResource($location);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        DB::table('store_location')->where('location_id', $location->id)->delete();
        $location->delete();

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
