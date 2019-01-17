<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class PaidEvent extends Event
{
    protected $table = 'paid_event';
    private $price = 0;

    function getPrice(){
      return $this->price;
    }

    function setPrice($newPrice){
      $this->price = $newPrice;
    }
}
