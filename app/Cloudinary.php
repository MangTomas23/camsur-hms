<?php

namespace App;

class Cloudinary {
   public static function getURL($public_id) {
     return "https://res.cloudinary.com/".env('CLOUDINARY_CLOUD_NAME')."/image/upload/$public_id";
   }
}
