<?php

namespace App\Controllers;


class Home extends Abstracts\BaseController{
  public function home() {

    \Framework\DB\Connection::getConnection();
    $data['page'] = 'homeView';
    $this->view('indexView', $data);
  }
}