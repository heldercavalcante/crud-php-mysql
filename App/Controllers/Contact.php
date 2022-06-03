<?php

namespace App\Controllers;

class Contact extends Abstracts\BaseController {
  public function contact() {
    $data['page'] = 'contactView';
    $this->view('indexView', $data);
  }
}