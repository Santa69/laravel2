<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    public function authors()
    {
      return $this->belongsToMany('App\Author');
    }
    public $timestamps = false;
}
