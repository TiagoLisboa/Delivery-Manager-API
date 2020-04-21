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

  public function receiver() {
    return $this->belongsTo('App\User');
  }

  public function carrier() {
    return $this->belongsTo('App\User');
  }

  public function delivery_address () {
    return $this->belongsTo('App\Address');
  }

  public function pickup_address () {
    return $this->belongsTo('App\Address');
  }
}
