<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Response extends Model
{

  public function make($success,$data){
    return ["success"=>$success,"data"=>$data];
  }


}
