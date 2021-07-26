<?php


namespace App\Http\Controllers;

use CrudServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

trait HasCrudActions
{
    /**
     * @var Model
     */
    public $model;

    /**
     * @var JsonResource
     */
    public $resource;

    /**
     * @var ResourceCollection
     */
    public $resourceCollection;

    /**
     * @var string[]
     */
    public $fillableFields = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public $services;
    public function index()
    {
        return new $this->resourceCollection($this->services->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        return new $this->resource($this->services->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $model)
    {
        return new $this->resource($this->services->find($model));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $model)
    {
        return new $this->resource($this->services->update($model, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $model)
    {
        $this->services->delete($model);

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
