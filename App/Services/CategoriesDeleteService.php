<?php

namespace App\Services;


class CategoriesDeleteService {

  private $categoriesRepository;

  public function __construct(\App\Repositories\ICategoriesRepository $categoriesRepository)
  {
    $this->categoriesRepository = $categoriesRepository;
    
  }

  public function delete(int $id) {
    return $this->categoriesRepository->delete($id);
  }
}