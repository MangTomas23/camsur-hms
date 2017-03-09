<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientController extends Controller
{
  public function index() {
    $patients = Patient::paginate(15);

    return view('patient.index', ['patients' => $patients]);
  }

  public function show($id) {
    $patient = Patient::find($id);
    return view('patient.show', ['patient' => $patient]);
  }

  public function search(Request $request) {
    $query = $request->q;
    $patients = Patient::search($query)->get();
    return view('patient.search', [
      'query' => $query,
      'patients' => $patients
    ]);
  }
}
