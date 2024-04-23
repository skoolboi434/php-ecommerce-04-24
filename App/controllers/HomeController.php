<?php

namespace App\Controllers;

use Framework\Database;

use Traits\BrandTrait;

use PDO;

class HomeController {

  protected $db;
  public function __construct() {
    $config = require basePath('config/db.php');
    $this->db = new Database($config);
  }

  use BrandTrait;

  public function index() {
    $products = $this->db->query('SELECT * FROM products LIMIT 8')->fetchAll();

    $brands = $this->getUniqueBrands($this->db);

    loadView('home', [
      'products' => $products,
      'brands' => $brands
    ]);
  }
}