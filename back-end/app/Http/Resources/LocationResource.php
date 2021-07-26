<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    public static $wrap = 'location';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'zip_code' => $this->zip_code,
            'street' => $this->street,
            'number' => $this->number,
            'complement' => $this->complement,
            'city' => new CityResource($this->city),
        ];
    }
}
