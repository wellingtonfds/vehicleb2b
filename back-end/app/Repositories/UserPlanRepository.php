<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserPlan;
use App\Repositories\CrudRepositoryAbstract;

class UserPlanRepository extends CrudRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(UserPlan::class);
    }

    public function userPlanWithoutPayment(User $user, int $planId): UserPlan
    {
        return $this->model->where('user_id', $user->id)->where('plan_id', $planId)->whereNull('code_payment')->first();
    }
}
