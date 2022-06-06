<?php

namespace App\Repositories;


interface ICategoriesRepository {
  public function create(string $name);

  public function edit(int $id, string $name);

  public function listCategories(): array;

  public function delete(int $id);

  public function get(int $id): \stdClass;
}