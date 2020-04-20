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

  function receiver() {
    return $this->belongsTo('App\User');
  }

  function carrier() {
    return $this->belongsTo('App\User');
  }

  function delivery_address () {
    return $this->belongsTo('App\Address');
  }

  function pickup_address () {
    return $this->belongsTo('App\Address');
  }
}
