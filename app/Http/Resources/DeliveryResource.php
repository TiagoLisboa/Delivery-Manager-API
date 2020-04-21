<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryResource extends JsonResource
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
        'delivery' => $this->delivery,
        'receiver' => $this->receiver,
        'carrier' => $this->carrier,
        'delivery_address' => $this->delivery_address,
        'pickup_address' => $this->pickup_address,
        'delivery_term' => $this->delivery_term,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
      ];
    }
}
