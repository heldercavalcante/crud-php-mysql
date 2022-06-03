<?php


namespace Framework\Router;

class Routing {

  private $routers = [];
  private $page404;
  private $baseUrl;

  public function setPage404($func) {
    $this->page404 = $func;
  }

  public function setBaseUrl($baseUrl) {
      $this->baseUrl = $baseUrl;
  }

  public function get($uri, $class,$functionName) {
    $this->routers[] = new Route($uri, Route::METHOD_GET, $class,$functionName);
  }

  public function post($uri, $class,$functionName) {
    $this->routers[] = new Route($uri, Route::METHOD_POST, $class,$functionName);
  }

  public function run() {

    $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

    $uri = '/'.ltrim(str_ireplace($this->baseUrl, '', $url),'/');
    if(strpos($uri, '?') !== false) {
      $uri = explode('?', $uri)[0];
    }


    foreach ($this->routers as $route) {
        if ($route->getUri() ==  $uri && $_SERVER['REQUEST_METHOD'] == $route->getMethod()) {
            $namespace = "\\".$route->getClass();
            $instance = new $namespace;
            $instance->{$route->getFunctionName()}();
            exit;
        }
    }

    if ($this->page404) {
      call_user_func($this->page404);
    }

  }
}