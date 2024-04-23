<?php
require '../helpers.php';



$routes = [
  '/' => 'controllers/home.php',
  '/products' => 'controllers/products/index.php',
  '/products/create' => 'controllers/products/create.php',
  '404' => 'controllers/error/404.php'
];

$uri = $_SERVER['REQUEST_URI'];

if(array_key_exists($uri, $routes)) {
  require(basePath($routes[$uri]));
} else {
  require basePath($routes['404']);
}