<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'ExtendsController::index');
$routes->get('/about_us', 'ExtendsController::profile');