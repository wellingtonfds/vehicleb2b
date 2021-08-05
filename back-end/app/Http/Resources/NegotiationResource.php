<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NegotiationResource extends JsonResource
{
    public static $wrap = 'negotiation';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'vehicle' => new VehicleResource($this->resource->vehicle),
            'user' => new UserResource($this->resource->user)
        ];
    }
}
