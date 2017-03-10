<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;

class BulletinController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function index() {
    return view('bulletin.index', ['hospitals' => Hospital::all()]);
  }

  public function store(Request $request) {
    return $request->all();
  }
}
