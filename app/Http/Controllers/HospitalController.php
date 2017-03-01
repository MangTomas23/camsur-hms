<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;

class HospitalController extends Controller
{
  public function index() {
    $hospitals = Hospital::all();
    return view('hospital.index', ['hospitals' => $hospitals]);
  }

  public function show($id) {
    return view('hospital.show', ['hospital' => $this->getHospital($id)]);
  }

  public function patients($id) {
    return view('hospital.patient', [
      'patients' => $this->getPatients($id)
    ]);
  }

  private function getHospital($id) {
    return Hospital::find($id)->first();
  }

  private function getPatients($id) {
    return $this->getHospital($id)->patients()->paginate(15);
  }
}
