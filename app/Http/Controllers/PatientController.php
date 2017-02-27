<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientController extends Controller
{
  public function index() {
    $patients = Patient::all();
    return view('patient.index', ['patients' => $patients]);
  }
}
