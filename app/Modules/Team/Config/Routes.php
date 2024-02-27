<?php

$routes->group('team', ['namespace' => '\App\Modules\Team\Controllers'], function($subroutes) {
  $subroutes->get('/', 'Team::index');
  $subroutes->post('addTeam', 'Team::addTeam');
  $subroutes->delete('deleteTeam/(:num)', 'Team::deleteTeam/$1');
});