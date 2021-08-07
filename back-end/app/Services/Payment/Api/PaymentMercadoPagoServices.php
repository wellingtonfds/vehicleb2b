<?php

namespace App\Services\Payment\Api;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class PaymentMercadoPagoServices implements PaymentApiServiceInterface
{

    private String $url = 'https://api.mercadopago.com';

    public function __construct()
    {
    }

    public function createPayment(array $data)
    {
        Http::withHeaders([
            'Authorization' => 'Bearer ' . env('TOKEN_ML'),
            'Content-Type' => 'application/json'
        ])->post($this->url . '/v1/payments', $data);
    }
}
