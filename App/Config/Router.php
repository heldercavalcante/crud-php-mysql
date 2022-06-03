<?php


namespace App\Config;

class Router {
  public static function configRouters(\Framework\Router\Routing $router) {

    //base url
    $router->setBaseUrl(Config::$BASE_URL);

    //404
    $router->setPage404(function() {
      echo "Page 404";
    });

    //routers  
    $router->get('/', \App\Controllers\Home::class, 'home');
    $router->get('/about', \App\Controllers\About::class, 'about');
    $router->get('/contact', \App\Controllers\Contact::class, 'contact');

    //routers - admin
    $router->get('/admin/news/create', \App\Controllers\Admin\NewsController::class, 'create');
    $router->post('/admin/news/create/save', \App\Controllers\Admin\NewsController::class, 'saveNew');

    //routers - products
    $router->get('/admin/products/list-products', \App\Controllers\Admin\ProductsController::class, 'listProducts');
    $router->get('/admin/products/create', \App\Controllers\Admin\ProductsController::class, 'create');
    $router->post('/admin/products/create/save', \App\Controllers\Admin\ProductsController::class, 'saveCreate');
    $router->get('/admin/products/delete', \App\Controllers\Admin\ProductsController::class, 'delete');
    $router->get('/admin/products/edit', \App\Controllers\Admin\ProductsController::class, 'edit');
    $router->post('/admin/products/edit/save', \App\Controllers\Admin\ProductsController::class, 'saveEdit');


  }
}