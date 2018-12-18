<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = ['text','question_id'];

  public function question() {
    return $this->belongsTo('App\Question');
  }
}
