<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Auth::index');
$routes->get('auth', 'Auth::index');
$routes->post('auth/loginProcess', 'Auth::loginProcess');
$routes->get('auth/logout', 'Auth::logout');

$routes->get('buku', 'Buku::index');
$routes->post('buku/store', 'Buku::store');
$routes->get('buku/delete/(:num)', 'Buku::delete/$1');
$routes->post('buku/update/(:num)', 'Buku::update/$1');