<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostalCodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
            'name' => $this->name,
            'zip_code' => $this->zip_code,
            'gps_coordinates' => $this->gps_coordinates,
        ];
    }
}
