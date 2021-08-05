<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanResource;
use App\Services\Plan\PlanService;
use App\Services\Plan\PlanServiceInterface;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    public $model = Plan::class;
    public $resource = PlanResource::class;
    public $resourceCollection = LocationCollectionResource::class;
    public $service = PlanServiceInterface::class;

    public function __construct(PlanServiceInterface $service)
    {
        $this->service = $service;
    }
}
