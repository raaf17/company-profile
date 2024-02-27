<?php

// $routes->addRedirect('/', 'dashboard');
$routes->group('dashboard', ['namespace' => '\App\Modules\Dashboard\Controllers'], function($subroutes) {
  $subroutes->get('/', 'Dashboard::index');
});