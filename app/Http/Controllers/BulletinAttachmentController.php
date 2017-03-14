<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudder;

class BulletinAttachmentController extends Controller
{
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
