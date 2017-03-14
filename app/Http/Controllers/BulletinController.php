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
    $bulletin->bulletin_category_id = $request->bulletin_category;
    $bulletin->save();
    return ['bulletin_id' => $bulletin->id];
  }
}
