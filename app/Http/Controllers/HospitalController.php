<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;

class HospitalController extends Controller
{
  public function index() {
    return Hospital::all();
  }

  public function show($id) {
    return Hospital::find($id)->get();
  }
}
