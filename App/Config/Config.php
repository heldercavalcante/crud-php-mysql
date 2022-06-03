<?php

namespace App\Config;

class Config {
  static $BASE_URL = "http://localhost/";
  static $UPLOAD_DIR = "assets/uploads";
  static $UPLOAD_IMAGE_ALLOWED_EXTENSIONS = ['jpg','jpeg','png','gif'];

  public static function url(string $uri='') {
    return rtrim(self::$BASE_URL,'/').'/'.ltrim($uri,'/');
  }


  public static function getUploadDir() {
    return rtrim(self::$UPLOAD_DIR,'/').'/';
  }

  public static function getFullUploadDir() {
      return realpath(__DIR__.'/../../').'/'.self::getUploadDir();
  }
}