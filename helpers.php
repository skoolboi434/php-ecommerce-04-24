<?php

define('BASE_URL', 'http://localhost:9000');

/**
 * Get the base path
 * 
 * @param string $path
 * @return string
 */

function basePath($path = '')
{
  return __DIR__ . '/' . $path;
}

/**
 * Load a view
 * @param string $name
 * @return void
 */

function loadView($name) {

  $viewPath = basePath("views/{$name}.view.php");

  if(file_exists($viewPath)) {
    require $viewPath;
  } else {
    echo "View '{$name} not found!'";
  }
}

/**
 * Load a partial
 * @param string $name
 * @return void
 */

function loadPartial($name) {
  $partialPath = basePath("views/partials/{$name}.php");

  if(file_exists($partialPath)) {
    require $partialPath;
  } else {
    echo "Partial '{$name} not found!'";
  }
}

/**
 * Inspect a valuse(s)
 * 
 * @param mixed $value
 * @return void
 */

function inspect($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
}

/**
 * Inspect a valuse(s) and die
 * 
 * @param mixed $value
 * @return void
 */

function inspectAndDie($value)
{
  echo "<pre>";
  die(var_dump($value));


}

/**
 * Format Price
 * 
 * @param string $price
 * @return string Formatted Salary
 */

function formatPrice($price)
{
  return '$' . number_format(floatval($price), 2, '.', '') . '';
}