<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = ['user_id','payment_gateway_id','event_id'];

    public function user(){
      return $this->hasOne('App\User');
    }

    public function event(){
      return $this->belongsTo('App\Event');
    }

    public function paymentGateway(){
      return $this->belongsTo('App\PaymentGateway');
    }
}
