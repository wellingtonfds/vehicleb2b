<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanCollectionResource;
use App\Http\Resources\PlanResource;
use App\Models\Plan;
use App\Services\Plan\PlanService;


class PlansController extends Controller
{
    public $model = Plan::class;
    public $resource = PlanResource::class;
    public $resourceCollection = PlanCollectionResource::class;
    public $service = PlanService::class;

    public function __construct(PlanService $service)
    {
        $this->service = $service;
    }
}
