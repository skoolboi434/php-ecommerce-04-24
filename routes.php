<?php

$router->get('/', 'HomeController@index');
$router->get('/products', 'ProductController@index');
$router->get('/products/create', 'ProductController@create', ['auth']);
$router->get('/products/edit/{id}', 'ProductController@edit', ['auth']);
$router->get('/products/{id}', 'ProductController@show');
$router->get('/products/brands/{brand}', 'ProductController@brands');
$router->post('/products/search', 'ProductController@performSearch', ['guest']);



$router->post('/products', 'ProductController@store', ['auth']);

$router->put('/products/{id}', 'ProductController@update', ['auth']);

$router->delete('/products/{id}', 'ProductController@destroy', ['auth']);

// User routes

$router->get('/auth/register', 'UserController@create', ['guest']);
$router->get('/auth/login', 'UserController@login', ['guest']);

$router->post('/auth/login', 'UserController@authenticate', ['guest']);
$router->post('/auth/register', 'UserController@store', ['guest']);
$router->post('/auth/logout', 'UserController@logout', ['auth']);

// Cart routes

$router->get('/cart', 'CartController@index');

$router->post('/cart', 'CartController@addToCart');
$router->post('/cart/remove', 'CartController@removeFromCart');
$router->post('/cart/clear', 'CartController@clearCart');