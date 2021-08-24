<?php


namespace App\Http\Controllers;

use CrudServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Spatie\QueryBuilder\QueryBuilder;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public $service;
    public function index(Request $request)
    {
        $paginate = $request->has('per_page') ? $request->per_page : 20;
        $model = new $this->model;
        $list = QueryBuilder::for($this->model)
            ->allowedFilters($model->getFillable())
            ->allowedFields($model->getFillable())
            ->allowedSorts($model->getFillable())
            ->paginate($paginate);
        return new $this->resourceCollection($list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        return new $this->resource($this->service->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $model)
    {
        return new $this->resource($this->service->find($model));
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
        return new $this->resource($this->service->update($model, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $model)
    {
        $this->service->delete($model);

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
