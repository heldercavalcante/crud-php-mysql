<?php

namespace App\Services;


class CategoriesListService {

  private $CategoriesRepository;

  public function __construct(\App\Repositories\ICategoriesRepository $CategoriesRepository)
  {
    $this->CategoriesRepository = $CategoriesRepository;
    
  }

  public function listCategories(): array {
    return $this->CategoriesRepository->listCategories();
  }
}