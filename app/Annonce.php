<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function category()
    {
      return $this->belongsTo('App\Category');
    }

    public function photo()
    {
      return $this->hasMany('App\Photo');
    }
}
