<?php

namespace App\Factory\Payment;

use App\Services\Payment\Api\PaymentApiServiceInterface;
use App\Services\Payment\Api\PaymentMercadoPagoServices;

class PaymentFactory implements PaymentFactoryInterface
{
    public function mercadoPago(): PaymentApiServiceInterface
    {
        return new PaymentMercadoPagoServices();
    }
}
