<?php

namespace App\Controllers\Admin;

use App\Controllers\Abstracts\BaseController;

class ProductsController extends BaseController {

  //product form - create
  public function create() {
    //list categories
    $categoriesListRepository = new \App\Repositories\CategoriesRepository(\Framework\DB\Connection::getConnection());
    $categoriesListService = new \App\Services\CategoriesListService($categoriesListRepository);
    $categories = $categoriesListService->listCategories();

    $data['page'] = 'Admin/productCreateView';
    $data['categories'] = $categories;
    $this->view('Admin/indexView', $data);
  }

  //recieve information from product form and perform it on database
  public function saveCreate() {
    $image = $_FILES['image'];
    $product_cat_id = $_POST['product_cat_id'];
    $name = $_POST['name'];
    $price = (float) $_POST['price'];
    $description = $_POST['description'];

    $productsRepository = new \App\Repositories\ProductsRepository(\Framework\DB\Connection::getConnection());
    $uploadService = new \App\Services\UploadService();

    try{

    $productCreateService = new \App\Services\ProductCreateService($productsRepository,$uploadService);

    $productCreateService->create($product_cat_id ,$image['name'],$image['tmp_name'], $name, $price, $description);
    header("Location: ".\App\Config\Config::url("/admin/products/list-products"));
    } catch (\Exception $e) {
      echo "Error on create product: ".$e->getMessage();
    }
    
  }

  public function listProducts() {

    $productsListRepository = new \App\Repositories\ProductsRepository(\Framework\DB\Connection::getConnection());
    $productsListService = new \App\Services\ProductsListService($productsListRepository);
    $products = $productsListService->listProducts();

    $data['page'] = 'Admin/productsListView';
    $data['products'] = $products;
    //print_r($products);
    $this->view('Admin/indexView', $data);
  }

  public function delete() {
    $productId = $_GET['id'];

    try{
    $productsDeleteRepository = new \App\Repositories\ProductsRepository(\Framework\DB\Connection::getConnection());
    $productsDeleteService = new \App\Services\ProductsDeleteService($productsDeleteRepository);
    $productsDeleteService->delete($productId);
    header("Location: ".\App\Config\Config::url("/admin/products/list-products"));
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  public function edit() {
    $productId = $_GET['id'];

    $productsGetRepository = new \App\Repositories\ProductsRepository(\Framework\DB\Connection::getConnection());
    $productsGetService = new \App\Services\ProductsGetService($productsGetRepository);
    $product = $productsGetService->get($productId);

    $data['page'] = 'Admin/productEditView';
    $data['product'] = $product;
    $this->view('Admin/indexView', $data);
  }


  public function saveEdit() {
    $image = $_FILES['image'];
    $name = $_POST['name'];
    $price = (float) $_POST['price'];
    $description = $_POST['description'];
    $productId = $_GET['id'];

    $productsRepository = new \App\Repositories\ProductsRepository(\Framework\DB\Connection::getConnection());
    $uploadService = new \App\Services\UploadService();
    $productGetService = new \App\Services\ProductsGetService($productsRepository);

    try{

    $productEditService = new \App\Services\ProductEditService($productsRepository,$uploadService, $productGetService);

    $productEditService->edit($productId,$image['name'],$image['tmp_name'], $name, $price, $description);
    header("Location: ".\App\Config\Config::url("/admin/products/list-products"));
    } catch (\Exception $e) {
      echo "Error on create product: ".$e->getMessage();
    }
    
  }
}