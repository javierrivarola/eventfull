<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = ['name','event_type_id','price'];

    const freeEventTypeName = "GRATIS";
    const preInscriptionTypeName = "PRE_INSCRIPCION";
    const paidTypeName = "PAGO";

    public function talks(){
      return $this->hasMany('App\Talk');
    }

    public function attendants(){
      return $this->belongsToMany('App\User','users_events');
    }

    public function type(){
      return $this->belongsTo('App\EventType','event_type_id','id');
    }

}
