<?php

namespace App\Services\Payment\Api;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PaymentMercadoPagoServices implements PaymentApiServiceInterface
{

    private String $url = 'https://api.mercadopago.com';

    public function __construct()
    {
    }

    public function createPayment(array $data)
    {
        $response =  Http::withHeaders([
            'Authorization' => 'Bearer ' . env('TOKEN_ML'),
            'Content-Type' => 'application/json'
        ])->post($this->url . '/v1/payments', $data);

        if ($response->failed()) {
            // dd();
            // $response->status(), $response->body()
            throw new HttpResponseException(new Response($response->json(), $response->status()));
        }
    }
}
