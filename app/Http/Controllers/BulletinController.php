<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use Cloudder;

class BulletinController extends Controller
{
  // public function __construct() {
  //   $this->middleware('auth');
  // }

  public function index() {
    return view('bulletin.index', ['hospitals' => Hospital::all()]);
  }

  public function store(Request $request) {
    return $request->all();
  }

  public function upload(Request $request) {
    try {
      Cloudder::upload($request->qqfile);
      $result =  Cloudder::getResult();
      return ['success' => 'File uploaded successfully.'];
    }catch(\Exception $e) {
      return ['error' => 'Invalid'];
    }
  }
}
