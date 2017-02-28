<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  public function hospital() {
    return $this->belongsTo('App\Hospital');
  }
}
