<?php

namespace App\Repositories;


interface IProductsRepository {
  public function create(string $imageUri,string $name,float $price,string $description);

  public function edit(int $id,string $imageUri,string $name,float $price,string $description);

  public function listProducts(): array;

  public function delete(int $id);

  public function get(int $id): \stdClass;
}