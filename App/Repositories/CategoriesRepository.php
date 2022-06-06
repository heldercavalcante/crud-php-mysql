<?php

namespace App\Repositories;


class CategoriesRepository implements \App\Repositories\ICategoriesRepository{

  private $con;

  public function __construct(\mysqli $con) {
    $this->con = $con;
  }

  public function create(string $name) {
    $name = addslashes($name);

    $sql = "INSERT INTO categories(cat_name) VALUES('{$name}')";

    $this->con->query($sql);

    if($this->con->error) {
      throw new \Exception($this->con->error);
    }
    
  }

  public function listCategories(): array {
    $sql = "SELECT * FROM categories ORDER BY cat_id DESC";
    $result = $this->con->query($sql);

    if($this->con->error) {
      throw new \Exception($this->con->error);
    }
    
    $categories = [];

    while($category = $result->fetch_object()) {
      $categories[] = $category;
    }
    return $categories;

  }

  public function delete(int $id) {
    $sql = "DELETE FROM categories WHERE cat_id = ".$id;
    $this->con->query($sql);
    if($this->con->error) {
      throw new \Exception($this->con->error);
    }
  }

  public function get(int $id): \stdClass {
    $sql = "SELECT * FROM categories WHERE cat_id = ".$id;
    $result = $this->con->query($sql);

    if($this->con->error) {
      throw new \Exception($this->con->error);
    }
    
    if($result->num_rows <= 0) {
      throw new \Exception("there is no product with id: {$id}");
    }

    return $result->fetch_object();
    
  }

  public function edit(int $id, string $name) {

    $name = addslashes($name);

    $sql = "UPDATE categories SET cat_name = '{$name}' WHERE cat_id = '{$id}'";

    $this->con->query($sql);
    if($this->con->error) {
      throw new \Exception($this->con->error);
    }

  }

}