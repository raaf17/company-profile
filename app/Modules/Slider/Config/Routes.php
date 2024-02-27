<?php

$routes->group('slider', ['namespace' => '\App\Modules\Slider\Controllers'], function($subroutes) {
  $subroutes->get('/', 'Slider::index');
  $subroutes->post('addSlider', 'Slider::addSlider');
  $subroutes->delete('deleteSlider/(:num)', 'Slider::deleteSlider/$1');
});