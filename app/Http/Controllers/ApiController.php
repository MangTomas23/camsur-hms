<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Bulletin;
use Validator;

class ApiController extends Controller
{
  public function searchPatient(Request $request) {
    $validator = Validator::make($request->all(), [
      'name' => 'required'
    ]);

    if($validator->fails()) {
      return ['error' => 'Invalid request.'];
    }

    $patient = Patient::search($request->name)->get();

    if($patient->isEmpty()) {
      return ['error' => 'No results found.'];
    }

    return $patient;
  }

  public function getBulletins() {
    return Bulletin::with('category', 'hospital')->get();
  }
}
