<?php

// Route Daftar Produk
$routes->group('product', ['namespace' => '\App\Modules\Product\Controllers'], function($subroutes) {
  $subroutes->get('/', 'Product::index');
  $subroutes->get('newProduct', 'Product::newProduct');
  $subroutes->post('addProduct', 'Product::addProduct');
});

// Route Daftar Category
$routes->group('product', ['namespace' => '\App\Modules\Product\Controllers'], function($subroutes) {
  $subroutes->get('category', 'Product::category');
  $subroutes->post('addCategory', 'Product::addCategory');
  $subroutes->post('editCategory/(:num)', 'Product::editCategory/$1');
  $subroutes->delete('deleteCategory/(:num)', 'Product::deleteCategory/$1');
});