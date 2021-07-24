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
            'id' => $request->id,
            'name' => $request->name,
            'zip_code' => $request->zip_code,
            'street' => $request->street,
            'number' => $request->number,
            'complement' => $request->complement,
            'city' => $request->city,
        ];
    }
}
