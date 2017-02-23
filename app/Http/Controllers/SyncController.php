<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;


class SyncController extends Controller
{
  public function index() {

  }

  public function sync(Request $request) {
    $request = (object) $request->hospital;
    return json_encode($request);
    $patients = $request->tables['patients'];
    return json_encode($patients);




    $hospital = Hospital::firstOrNew(['hospitalid' => $hospitalid]);
    $hospital->save();
    return $request->all();
  }
}
