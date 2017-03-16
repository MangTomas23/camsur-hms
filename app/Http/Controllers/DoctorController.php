<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
  public function hospital() {
    return $this->belongsTo('App\Hospital');
  }
}
