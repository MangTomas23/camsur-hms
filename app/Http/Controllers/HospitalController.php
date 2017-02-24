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
    $hospital = Hospital::find($id)->first();
    $patients = $hospital->patients()->paginate(15);
    return view('hospital.show', ['hospital' => $hospital, 'patients' => $patients]);
  }
}
