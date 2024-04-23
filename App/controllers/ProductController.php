<?php

namespace App\Controllers;

use Framework\Database;

use PDO;

class ProductController {

  protected $db;
  public function __construct() {
    $config = require basePath('config/db.php');
    $this->db = new Database($config);
  }

  public function index() {
    $products = $this->db->query('SELECT * FROM products')->fetchAll();

    $brands = $this->db->query("SELECT DISTINCT brand FROM products")->fetchAll(PDO::FETCH_OBJ);

    loadView('products/index', [
      'products' => $products,
      'brands' => $brands
    ]);
  }

  public function create() {
    loadView('products/create');
  }

  public function show($params) {
    $id = $params['id'] ?? '';

    $params = [
      'id' => $id
    ];

    $product = $this->db->query('SELECT * FROM products WHERE id = :id', $params)->fetch();

    // Check if product exists

    if(!$product) {
      ErrorController::notFound('Product not found.');
      return;
    }

    loadView('products/show', [
      'product' => $product
    ]);
  }

  /**
   * Show products by brand
   */

  public function brands($params)
  {
    $brand = $params['brand'] ?? '';

    $params = [
      'brand' => $brand
    ];

    $products = $this->db->query("SELECT * FROM products WHERE brand = :brand ", $params)->fetchAll();



    loadView("/products/brands", ["products" => $products, "brand" => $brand]);
  }
}