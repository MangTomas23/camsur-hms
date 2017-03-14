<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cloudder;
use App\Cloudinary;

class BulletinAttachment extends Model
{
  protected $appends = ['url'];

  public function getUrlAttribute() {
    return $this->attributes['url'] = Cloudinary::getURL($this->public_id);
  }

  public function showCloud() {
    return Cloudder::show('rktyyfo1v0dzqacl1yjj');
  }

}
