<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
  protected $freeEventTypeName = "GRATIS";
  protected $preInscriptionTypeName = "PRE_INSCRIPCION";
  protected $paidTypeName = "PAGO";

  public function events(){
    return $this->hasMany('App\Event');
  }
}
