<?php

namespace App\Services;

use Exception;

class UploadService {
  public function upload($fileName, $filePath, $uploadDir, $allowedExtensions) {
    $fileNameSplited = explode('.', $fileName);
    $extension = end($fileNameSplited);
    if (!in_array(strtolower($extension), $allowedExtensions)) {
      throw new Exception("extension {$extension} not allowed. Allowed extensions are: ".implode(', ', $allowedExtensions));
    }

    if(!is_file($filePath)) {
      throw new \Exception("file {$filePath} not found");
    }


    $content = file_get_contents($filePath);
    $fileName = uniqid("upload").'_'.$fileName;

    $newFullFileName = rtrim($uploadDir,'/').'/'.$fileName;
    $storaged = file_put_contents($newFullFileName, $content);

    if (!$storaged) {
      throw new \Exception("error saving file {$newFullFileName} check the permissions");
    }

    return \App\Config\Config::getUploadDir().$fileName;
  }
}