<?php

namespace App\Factory\Payment;

use App\Models\Plan;
use App\Models\User;


class PaymentFactory implements PaymentFactoryInterface
{
    public function mercadoPago(User $user, Plan $plan): array
    {
        return [
            "additional_info" => [
                "items" => [
                    [
                        "id" => $plan->id,
                        "title" => $plan->name,
                        "description" => $plan->description,
                        "picture_url" => "https://http2.mlstatic.com/resources/frontend/statics/growth-sellers-landings/device-mlb-point-i_medium@2x.png",
                        "category_id" => "service",
                        "quantity" => 1,
                        "unit_price" => $plan->price
                    ]

                ],
                "payer" => [
                    "first_name" => $user->firstName,
                    "last_name" => $user->lastName,
                    "phone" => [
                        "area_code" => 11,
                        "number" => "987654321"
                    ],
                    "address" => []
                ],
                "shipments" =>  [
                    "receiver_address" => [
                        "zip_code" => "12312-123",
                        "state_name" => "Rio de Janeiro",
                        "city_name" => "Buzios",
                        "street_name" => "Av das Nacoes Unidas",
                        "street_number" => 3003
                    ]
                ],
                "barcode" => []
            ],
            "description" => "Payment for service",
            "external_reference" => "MP0001",
            "installments" => 1,
            "metadata" => [],
            "order" => [
                "type" => "mercadolibre"
            ],
            "payer" => [
                "entity_type" => "individual",
                "type" => "customer",
                "identification" => []
            ],
            "payment_method_id" => "visa",
            "transaction_amount" => 58.8

        ];
    }
}
