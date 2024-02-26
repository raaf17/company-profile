<?php

$routes->group('account', ['namespace' => '\App\Modules\Account\Controllers'], function($subroutes) {
  $subroutes->get('/', 'Account::index');
  $subroutes->delete('deleteAccount', 'Account::deleteAccount');
});