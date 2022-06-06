<?php

namespace App\Services;


class CategoryEditService {
  private $categoriesRepository;
  private $categoriesGetService;

  function __construct(\App\Repositories\ICategoriesRepository $categoriesRepository,\App\Services\CategoriesGetService $categoriesGetService){
    $this->categoriesRepository = $categoriesRepository;
    $this->categoriesGetService = $categoriesGetService;
  }

  public function edit(int $id,string $name) {
    if (empty($name)) {
      throw new \Exception("invalid category name");
    }

    $category = $this->categoriesGetService->get($id);

    $this->categoriesRepository->edit($id,$name);
  }
}