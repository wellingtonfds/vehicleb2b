<?php

namespace App\Services\UserPlan;

use App\Models\User;
use App\Models\UserPlan;
use App\Repositories\UserPlanRepository;
use App\Services\Crud\CrudServiceAbstract;
use App\Services\UserPlan\UserPlanServiceInterface;

class UserPlanService extends CrudServiceAbstract implements UserPlanServiceInterface
{
    public function __construct()
    {
        parent::__construct(new UserPlanRepository());
    }

    public function userPlanWithoutPayment(User $user, int $planId): UserPlan
    {
        return $this->repository->userPlanWithoutPayment($user, $planId);
    }
}
