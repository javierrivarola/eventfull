<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['text','talk_id'];

    public function talk(){
      return $this->belongsTo('App\Talk');
    }

    public function comments(){
      return $this->hasMany('App\Comment');
    }
}
