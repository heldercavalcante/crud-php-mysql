<?php

namespace App\Repositories;


class ProductsRepository implements \App\Repositories\IProductsRepository{

  private $con;

  public function __construct(\mysqli $con) {
    $this->con = $con;
  }

  public function create(int $product_cat_id ,string $imageUri,string $name,float $price,string $description) {
    $name = addslashes($name);
    $price = addslashes($price);
    $description = addslashes($description);
    //$name = addslashes($name);
    $createdAt = date('Y-m-d H:i:s');

    $sql = "INSERT INTO products(product_cat_id ,name, price, description, image, created_at) VALUES({$product_cat_id},'{$name}',{$price},'{$description}','{$imageUri}','{$createdAt}')";

    $this->con->query($sql);

    if($this->con->error) {
      throw new \Exception($this->con->error);
    }
    
  }

  public function listProducts(): array {
    $sql = "SELECT product_id, product_cat_id, name, price, description, image, created_at, cat_name FROM products JOIN categories on categories.cat_id = products.product_cat_id ORDER BY product_id DESC";
    $result = $this->con->query($sql);

    if($this->con->error) {
      throw new \Exception($this->con->error);
    }
    
    $products = [];

    while($product = $result->fetch_object()) {
      $products[] = $product;
    }
    return $products;

  }

  public function delete(int $id) {
    $sql = "DELETE FROM products WHERE product_id = ".$id;
    $this->con->query($sql);
    if($this->con->error) {
      throw new \Exception($this->con->error);
    }
  }

  public function get(int $id): \stdClass {
    $sql = "SELECT * FROM products WHERE product_id = ".$id;
    $result = $this->con->query($sql);

    if($this->con->error) {
      throw new \Exception($this->con->error);
    }
    
    if($result->num_rows <= 0) {
      throw new \Exception("there is no product with id: {$id}");
    }

    return $result->fetch_object();
    
  }

  public function edit(int $id, string $imageUri, string $name, float $price, string $description) {

    $name = addslashes($name);
    $price = addslashes($price);
    $description = addslashes($description);

    $sql = "UPDATE products SET name = '{$name}', price = {$price}, description = '{$description}', image = '{$imageUri}' WHERE product_id = '{$id}'";

    $this->con->query($sql);
    if($this->con->error) {
      throw new \Exception($this->con->error);
    }

  }

}