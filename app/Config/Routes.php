<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('/', 'HelloWorld::index');

$routes->get('/login', 'AuthController::index');
$routes->post('/login/auth', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/formulir', 'UserController::formulir');
$routes->post('/formulir/create', 'UserController::create');

$routes->group('', ['filter' => 'auth'], function ($routes) {
  $routes->get('/', 'HomeController::index');
  $routes->get('/home', 'HomeController::index');
  $routes->get('/berita', 'BeritaController::index');

  $routes->resource('/mahasiswa', ['controller' => 'MahasiswaController']);
});
