<?php

namespace App\Repositories;


class NewsRepository {

  private $con;

  public function __construct(\mysqli $con) {
    $this->con = $con;
  }

  public function create($imageUri, $title, $resume, $news) {
    $this->con->query("INSERT INTO news(title, resume, news, img_uri, created_at) Values('".addslashes($title)."','".addslashes($resume)."','".addslashes($news)."','".addslashes($imageUri)."', '".date('Y-m-d H:i:s')."')");
    if($this->con->error) {
      throw new \Exception($this->con->error);
    }
  }
}