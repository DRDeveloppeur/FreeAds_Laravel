<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function annonce()
  {
    return $this->hasMany('App\Annonce');
  }
}
