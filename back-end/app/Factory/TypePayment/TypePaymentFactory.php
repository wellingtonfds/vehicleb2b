<?php

namespace App\Factory\TypePayment;

use App\Factory\TypePayment\TypePaymentFactoryInterface;
use App\Services\Payment\Api\PaymentApiServiceInterface;
use App\Services\Payment\Api\PaymentMercadoPagoServices;

class TypePaymentFactory implements TypePaymentFactoryInterface
{
    public function mercadoPago(): PaymentApiServiceInterface
    {
        return new PaymentMercadoPagoServices();
    }
}
