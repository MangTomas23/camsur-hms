<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Patient;
use App\Doctor;
use App\Nurse;
use App\Payment;

class HospitalController extends Controller
{
  public function __construct() {
    return $this->middleware('auth');
  }

  public function index() {
    $hospitals = Hospital::all();
    return view('hospital.index', ['hospitals' => $hospitals]);
  }

  public function show($id) {
    $hospital = $this->getHospital($id);
    return view('hospital.show', [
      'hospital' => $hospital,
      'count' => $hospital->patients->count()
    ]);
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
    return view('hospital.payment', [
      'payments' => Payment::all()
    ]);
  }

  public function doctors() {
    return view('hospital.doctor', [
      'doctors' => Doctor::all()
    ]);
  }

  public function nurses() {
    return view('hospital.nurse', [
      'nurses' => Nurse::all()
    ]);
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
