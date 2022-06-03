<?php

namespace Framework\Router;

class Route {

  const METHOD_GET = 'GET';
  const METHOD_POST = 'POST';

  private $uri;
  private $method;
  private $class;
  private $functionName;

  function __construct($uri, $method, $class, $functionName) {
      $this->uri = $uri;
      $this->method = $method;
      $this->class = $class;
      $this->functionName = $functionName;
  }

  function getUri() {
    return $this->uri;
  }

  function getMethod() {
    return $this->method;
  }

  function getClass() {
    return $this->class;
  }

  function getFunctionName() {
    return $this->functionName;
  }
}