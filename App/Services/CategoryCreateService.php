<?php

namespace App\Services;


class CategoryCreateService {
  private $categoriesRepository;

  function __construct(\App\Repositories\ICategoriesRepository $categoriesRepository){
    $this->categoriesRepository = $categoriesRepository;
  }

  public function create(string $name) {
    if (empty($name)) {
      throw new \Exception("invalid category name");
    }

    $this->categoriesRepository->create($name);
  }
}