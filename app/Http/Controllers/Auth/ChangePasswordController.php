<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Auth;

class ChangePasswordController extends Controller
{
  private $validator;

  public function __construct() {
    $this->middleware('auth');
  }

  public function index() {
    return view('auth.change');
  }

  public function updatePassword(Request $request) {

    if(!$this->validatePassword($request->old_password))
      return $this->sendErrorResponse();

    if($this->validateInputs($request->all()))
      return $this->sendErrorResponse();

    $user = Auth::user();
    $user->password = bcrypt($request->new_password);
    $user->save();

    return back()->with('success', 'Password changed successfully.');
  }

  private function validatePassword($old_password) {
    return Hash::check($old_password, Auth::user()->password);
  }

  private function validateInputs($inputs) {
    $this->validator = Validator::make($inputs, [
      'old_password' => 'required',
      'new_password' => 'required|confirmed'
    ]);

    return $this->validator->fails();
  }

  private function sendErrorResponse() {
    return back()->withErrors($this->validator);
  }
}
