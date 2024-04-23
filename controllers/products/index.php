<?php 

$config = require basePath('config/db.php');
$db = new Database($config);

$products = $db->query('SELECT * FROM products')->fetchAll();

loadView('products/index', [
  'products' => $products
]);