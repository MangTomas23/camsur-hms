<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;

class MemoController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function index() {
    return view('memo.index', ['hospitals' => Hospital::all()]);
  }
}
