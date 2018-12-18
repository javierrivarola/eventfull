<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //

    public function talk(){
      return $this->belongsTo('App\Talk');
    }
}
