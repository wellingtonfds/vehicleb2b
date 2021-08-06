<?php

namespace App\Services\Payment;

use App\Factory\Payment\PaymentFactory;

class PaymentService implements PaymentServiceInterface
{

    public function pay()
    {
        $payment = (new PaymentFactory())->mercadoPago();
    }
}
