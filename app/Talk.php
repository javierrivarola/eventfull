<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{

    protected $fillable = ['name','event_id','user_id'];

    public function event(){
      return $this->belongsTo('App\Event');
    }

    public function questions(){
      return $this->hasMany('App\Question');
    }

    public function speaker(){
      return $this->belongsTo('App\User','user_id');
    }

    /**
    * Adds the user provided as the speaker of the talk
    */
    public function addSpeaker($user) {

    }
}
