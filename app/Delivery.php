<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
  protected $fillable = [
    'delivery',
    'receiver_id',
    'carrier_id',
    'delivery_address_id',
    'pickup_address_id',
    'delivery_term',
  ];
}
