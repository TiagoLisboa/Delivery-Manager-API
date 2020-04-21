<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
        "id" => $this->id,
        "address" => $this->address,
        "complement" => $this->complement,
        "neighborhood" => $this->neighborhood,
        "city" => $this->city,
        "state" => $this->state,
        "CEP" => $this->CEP,
        "created_at" => $this->created_at,
        "updated_at" => $this->updated_at,
        "user" => $this->user
      ];
    }
}
