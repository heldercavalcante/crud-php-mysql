<?php

namespace App\Controllers;

class About extends Abstracts\BaseController{
  public function about() {
    $data['page'] = 'aboutView';
    $this->view('indexView', $data);
  }
}