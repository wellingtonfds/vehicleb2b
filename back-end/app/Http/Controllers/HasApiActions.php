<?php


namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

trait HasApiActions
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
    public function index()
    {
        $models = $this->model::all();

        return new $this->resourceCollection($models);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $model = new $this->model();
            $model->fill($request->only($this->fillableFields));
            $model->saveOrFail();
        } catch (\Throwable $exception) {
            throw new UnprocessableEntityHttpException('Could not create model', $exception);
        }

        return new $this->resource($model);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(Model $model)
    {
        return new $this->resource($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, Model $model)
    {
        try {
            $model->fill($request->only($this->fillableFields));
            $model->saveOrFail();
        } catch (\Throwable $exception) {
            throw new UnprocessableEntityHttpException('Could not update model', $exception);
        }

        return new $this->resource($model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(Model $model)
    {
        $model->delete();

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
