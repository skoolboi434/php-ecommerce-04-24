<?php

$config = require basePath('config/db.php');
$db = new Database($config);

$id = $_GET['id'] ?? '';

$params = [
  'id' => $id
];

$product = $db->query('SELECT * FROM products WHERE id = :id', $params)->fetch();


loadView('products/show', [
  'product' => $product
]);