<?php

namespace App\Services\Plan;

use App\Repositories\PlanRepository;
use App\Services\Crud\CrudServiceAbstract;
use App\Services\Plan\PlanServiceInterface;

class PlanService extends CrudServiceAbstract implements PlanServiceInterface
{
    public function __construct()
    {
        parent::__construct(new PlanRepository());
    }
}
