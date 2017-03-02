<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Patient extends Model
{
  use SearchableTrait;

  protected $searchable = [
    'columns' => [
      'firstname' => 10
    ]
  ];

  public function hospital() {
    return $this->belongsTo('App\Hospital');
  }

  public function fullname() {
    return $this->firstname.' '.$this->middlename.' '.$this->lastname;
  }
}
