<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$route['profile'] = 'ProfileController';
$routes->get('profile', 'ProfileController::profile');
