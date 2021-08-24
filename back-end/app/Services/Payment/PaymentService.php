<?php

namespace App\Services\Payment;

use App\Factory\Payment\PaymentFactory;
use App\Factory\Payment\TypePaymentFactory;
use App\Models\Plan;
use App\Models\User;

class PaymentService implements PaymentServiceInterface
{

    public function pay(User $user, Plan $plan): void
    {
        $typePayment = (new TypePaymentFactory())->mercadoPago();
        $payment = (new PaymentFactory)->mercadoPago($user, $plan);
    }
}
