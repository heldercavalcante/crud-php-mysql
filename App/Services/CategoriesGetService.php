<?php

namespace App\Services;


class CategoriesGetService {

  private $categoriesRepository;

  public function __construct(\App\Repositories\ICategoriesRepository $categoriesRepository)
  {
    $this->categoriesRepository = $categoriesRepository;
    
  }

  public function get(int $id): \stdClass{
    return $this->categoriesRepository->get($id);
  }
}