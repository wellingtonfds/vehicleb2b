<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
{
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
            'name' => $this->id,
            'image_url' => $this->image_url,
            'background_url' => $this->background_url,
            'description' => $this->description,
            'locations' => new LocationCollectionResource($this->locations),
        ];
    }
}
