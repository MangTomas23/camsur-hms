<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cloudder;

class BulletinAttachment extends Model
{
  public function showCloud() {
    return Cloudder::show('rktyyfo1v0dzqacl1yjj');
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
