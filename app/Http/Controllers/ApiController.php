<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class ApiController extends Controller
{
  public function searchPatient(Request $request) {
    return Patient::search($request->name)->get();
  }
}
