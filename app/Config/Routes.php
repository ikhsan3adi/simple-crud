<?php

use App\Controllers\Mahasiswa;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'HelloWorld::index');

$routes->resource('/mahasiswa', ['controller' => 'Mahasiswa']);
