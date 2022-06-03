<?php


namespace App\Controllers\Abstracts;



abstract class BaseController {
  public function view($viewName, $data = []) {
    $viewPaths = realpath(__DIR__.'/../../Views').'/';
    $fileView = $viewPaths.$viewName.'.php';
    if (!file_exists($fileView)) {
      throw new \Exception('View file not found: '.$fileView);
    }

    extract($data);
    include $fileView;
  }
}