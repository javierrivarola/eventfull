<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class PaidEvent extends Event
{
    private $price = 0;

    function getPrice(){
      return $this->price;
    }

    function setPrice($newPrice){
      $this->price = $newPrice;
    }
}
