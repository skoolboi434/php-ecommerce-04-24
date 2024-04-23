<?php

namespace App\Controllers;

use Framework\Database;

use PDO;

class HomeController {

  protected $db;
  public function __construct() {
    $config = require basePath('config/db.php');
    $this->db = new Database($config);
  }

  public function index() {
    $products = $this->db->query('SELECT * FROM products LIMIT 8')->fetchAll();

    $brands = $this->db->query("SELECT DISTINCT brand FROM products")->fetchAll(PDO::FETCH_OBJ);

    loadView('home', [
      'products' => $products,
      'brands' => $brands
    ]);
  }
}