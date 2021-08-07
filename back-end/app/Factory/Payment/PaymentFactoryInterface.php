<?php

namespace App\Factory\Payment;

use App\Models\Plan;
use App\Models\User;

interface PaymentFactoryInterface
{
    public function mercadoPago(User $user, Plan $plan): array;
}
