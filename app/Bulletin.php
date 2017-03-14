<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
  public function category() {
    return $this->belongsTo('App\BulletinCategory', 'bulletin_category_id');
  }

  public function hospital() {
    return $this->belongsTo('App\Hospital');
  }

  public function attachments() {
    return $this->hasMany('App\BulletinAttachment');
  }
}
