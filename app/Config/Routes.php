<?php

// use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

use App\Controllers\ExtendsController;

$routes->get('products_create', 'ExtendsController::products_create');
$routes->post('products_edit1', 'ExtendsController::products_edit1');
$routes->get('products_delete/(:num)', 'ExtendsController::products_delete/$1');
$routes->post('products_update1/(:num)', 'ExtendsController::products_update1/$1');
$routes->get('products_view', 'ExtendsController::products_view');
$routes->get('products_create', 'ExtendsController::products_create');
$routes->post('products_store', 'ExtendsController::products_store');
$routes->get('products_recyclebin', 'ExtendsController::products_recyclebin');
$routes->get('products_recycle/(:num)', 'ExtendsController::products_recycle/$1');
$routes->get('products_edit/(:num)', 'ExtendsController::products_edit/$1');
$routes->post('products_update2/(:num)', 'ExtendsController::products_update2/$1');
