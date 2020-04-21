<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $fillable = [
    'address',
    'complement',
    'neighborhood',
    'city',
    'state',
    'CEP',
    'user_id'
  ];

  public function user() {
    return $this->belongsTo('App\User');
  }
}
