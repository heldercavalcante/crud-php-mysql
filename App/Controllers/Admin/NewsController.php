<?php

namespace App\Controllers\Admin;

use App\Controllers\Abstracts\BaseController;

class NewsController extends BaseController{
  public function create() {
    $data['page'] = 'Admin/newsCreateView';
    $this->view('Admin/indexView', $data);
  }

  public function saveNew() {
    //var_dump(\App\Config\Config::getUploadDir());exit;

    $imagePath = $_FILES["image"]["tmp_name"];
    $imageName = $_FILES["image"]["name"];

    $tittle = $_POST['title'];
    $resume = $_POST['resume'];
    $news = $_POST['news'];

    try {

    $uploadService = new \App\Services\UploadService();
    $newsRepository = new \App\Repositories\NewsRepository(\Framework\DB\Connection::getConnection());

    $newsService = new \App\Services\NewsService($uploadService, $newsRepository);
    $newsService->create($imageName, $imagePath, $tittle, $resume, $news);
    echo "News created";
    } catch (\Exception $e) {
      echo "Error on creating news: ".$e->getMessage();
    }
    
  }
}