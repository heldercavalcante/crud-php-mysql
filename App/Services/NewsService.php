<?php

namespace App\Services;

use Exception;

class NewsService {

  private $uploadService;
  private $newsRepository;

  public function __construct(UploadService $uploadService, \App\Repositories\NewsRepository $newsRepository){
    $this->uploadService = $uploadService;
    $this->newsRepository = $newsRepository;
  }


  public function create($imageName, $imagePath, $title, $resume, $news) {
    
    if(!$title) {
      throw new Exception("title is required");
    }

    if(!$resume) {
    throw new Exception("resume is required");
    }

    if(!$news) {
    throw new Exception("news is required");
    }  
      
    
    $imageUri = $this->uploadService->upload($imageName,$imagePath,\App\Config\Config::getFullUploadDir(),['jpg','jpeg','png']);

    $this->newsRepository->create($imageUri, $title,$resume, $news);

  }
}