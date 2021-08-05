<?php

namespace App\Http\Controllers;

use App\Http\Resources\NegotiationCollectionResource;
use App\Http\Resources\NegotiationResource;
use App\Models\Negotiation;

class NegotiationsController extends Controller
{
    public $resourceCollection = NegotiationCollectionResource::class;

    public $resource = NegotiationResource::class;

    public $model = Negotiation::class;
}
