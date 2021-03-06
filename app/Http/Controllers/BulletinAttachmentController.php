<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudder;
use App\BulletinAttachment;

class BulletinAttachmentController extends Controller
{
  public function upload(Request $request) {
    try {
      Cloudder::upload($request->qqfile);
      $result = (object) Cloudder::getResult();
      $bulletinAttachment = new BulletinAttachment;
      $bulletinAttachment->public_id = $result->public_id;
      $bulletinAttachment->bulletin_id = $request->bulletin_id;
      $bulletinAttachment->filename = $request->qqfilename;
      $bulletinAttachment->save();
      return ['success' => 'File uploaded successfully.'];
    }catch(\Exception $e) {
      return ['error' => 'Invalid'];
    }
  }
}
