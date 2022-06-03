<?php

namespace App\Services;


class ProductsGetService {

  private $productsRepository;

  public function __construct(\App\Repositories\IProductsRepository $productsRepository)
  {
    $this->productsRepository = $productsRepository;
    
  }

  public function get(int $id): \stdClass{
    return $this->productsRepository->get($id);
  }
}