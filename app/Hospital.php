<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
  protected $fillable = ['hospitalid'];

  public function patients() {
    return $this->hasMany('App\Patient');
  }

  public function suppliers() {
    return $this->hasMany('App\Supplier');
  }
}
