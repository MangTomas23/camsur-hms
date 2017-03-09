<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Patient;

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
      'patients' => $this->getPatients($id),
      'hospital' => $this->getHospital($id)
    ]);
  }

  public function inventory($id) {
    return view('hospital.inventory');
  }

  public function payments() {
    return view('hospital.payment');
  }

  public function doctors() {
    return view('hospital.doctor');
  }

  public function nurses() {
    return view('hospital.nurse');
  }

  private function getHospital($id) {
    return Hospital::find($id);
  }

  private function getPatients($id) {
    return $this->getHospital($id)->patients()->paginate(15);
  }

  public function searchPatient($id, Request $request) {
    $patients = Hospital::find($id)->patients()->search($request->q)->get();
    return view('patient.search', [
      'query' => $request->q,
      'patients' => $patients
    ]);
  }
}
