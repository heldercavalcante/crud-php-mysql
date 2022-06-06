<?php

namespace App\Controllers\Admin;

use App\Controllers\Abstracts\BaseController;

class CategoriesController extends BaseController {

  //product form - create
  public function create() {
    $data['page'] = 'Admin/categoryCreateView';
    $this->view('Admin/indexView', $data);
  }

  //recieve information from product form and perform it on database
  public function saveCreate() {
    $name = $_POST['name'];
    $categoriesRepository = new \App\Repositories\CategoriesRepository(\Framework\DB\Connection::getConnection());

    try{

    $categoriesCreateService = new \App\Services\CategoryCreateService($categoriesRepository);

    $categoriesCreateService->create($name);
    header("Location: ".\App\Config\Config::url("/admin/categories/list-categories"));
    } catch (\Exception $e) {
      echo "Error on create product: ".$e->getMessage();
    }
    
  }

  public function listCategories() {

    $categoriesListRepository = new \App\Repositories\CategoriesRepository(\Framework\DB\Connection::getConnection());
    $categoriesListService = new \App\Services\CategoriesListService($categoriesListRepository);
    $categories = $categoriesListService->listCategories();

    $data['page'] = 'Admin/categoriesListView';
    $data['categories'] = $categories;
    //print_r($products);
    $this->view('Admin/indexView', $data);
  }

  public function delete() {
    $categoryId = $_GET['id'];

    try{
    $categoriesDeleteRepository = new \App\Repositories\CategoriesRepository(\Framework\DB\Connection::getConnection());
    $categoriesDeleteService = new \App\Services\CategoriesDeleteService($categoriesDeleteRepository);
    $categoriesDeleteService->delete($categoryId);
    header("Location: ".\App\Config\Config::url("/admin/categories/list-categories"));
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  public function edit() {
    $categoryId = $_GET['id'];

    $categoriesGetRepository = new \App\Repositories\CategoriesRepository(\Framework\DB\Connection::getConnection());
    $categoriesGetService = new \App\Services\CategoriesGetService($categoriesGetRepository);
    $category = $categoriesGetService->get($categoryId);

    $data['page'] = 'Admin/categoryEditView';
    $data['category'] = $category;
    $this->view('Admin/indexView', $data);
  }


  public function saveEdit() {
    $name = $_POST['name'];
    $categoryId = $_GET['id'];

    $categoriesRepository = new \App\Repositories\CategoriesRepository(\Framework\DB\Connection::getConnection());
    $categoriesGetService = new \App\Services\CategoriesGetService($categoriesRepository);

    try{

    $categoryEditService = new \App\Services\CategoryEditService($categoriesRepository, $categoriesGetService);

    $categoryEditService->edit($categoryId, $name);
    header("Location: ".\App\Config\Config::url("/admin/categories/list-categories"));
    } catch (\Exception $e) {
      echo "Error on edit category: ".$e->getMessage();
    }
    
  }
}