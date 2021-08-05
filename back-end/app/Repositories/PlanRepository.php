<?php

namespace App\Repositories;

use App\Models\Plan;
use App\Repositories\CrudRepositoryAbstract;

class PlanRepository extends CrudRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(Plan::class);
    }
}
