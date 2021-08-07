<?php

namespace App\Services\Payment;

use App\Models\Plan;
use App\Models\User;

interface PaymentServiceInterface
{

    public function pay(User $user, Plan $plan): void;
}
