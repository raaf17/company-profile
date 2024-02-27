<?php

$routes->addRedirect('/', 'beranda');
$routes->group('beranda', ['namespace' => '\App\Modules\Beranda\Controllers'], function($subroutes) {
  $subroutes->get('/', 'Beranda::index');
});