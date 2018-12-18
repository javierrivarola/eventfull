<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{

    protected $fillable = ['name','event_id','user_id'];

    public function event(){
      return $this->belongsToMany('App\Event');
    }

    public function questions(){
      return $this->hasMany('App\Question');
    }
}
