<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
  public function index() {
    return view('user.index', [
      'users' => User::all()
    ]);
  }

  public function create() {
    return view('user.create');
  }
}
