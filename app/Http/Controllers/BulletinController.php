<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Bulletin;
use App\BulletinCategory;
use Cloudder;

class BulletinController extends Controller
{
  // public function __construct() {
  //   $this->middleware('auth');
  // }

  public function index() {
    return view('bulletin.index', [
      'hospitals' => Hospital::all(),
      'bulletin_categories' => BulletinCategory::all()
    ]);
  }

  public function store(Request $request) {
    $hospital_id = $request->hospital=='all' ? null:$request->hospital;
    $bulletin = new Bulletin;
    $bulletin->subject = $request->subject;
    $bulletin->description = $request->description;
    $bulletin->hospital_id = $hospital_id;
    $bulletin->save();
    return ['bulletin_id' => $bulletin->id];
  }

  public function upload(Request $request) {
    try {
      Cloudder::upload($request->qqfile);
      $result =  Cloudder::getResult();
      // $result->public_id;
      // $result->public_id;
      // $result->format;
      return ['success' => 'File uploaded successfully.'];
    }catch(\Exception $e) {
      return ['error' => 'Invalid'];
    }
  }
}
