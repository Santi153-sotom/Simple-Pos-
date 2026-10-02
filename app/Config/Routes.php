<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Pages::home');
$routes->get('about', 'Pages::about');
$routes->get('customers', 'Customers::index');
$routes->match(['get', 'post'], 'customers/new', 'Customers::new');
$routes->match(['get', 'post'], 'customers/edit/(:num)', 'Customers::edit/$1');
$routes->get('users', 'Users::index');
$routes->match(['get', 'post'], 'users/new', 'Users::new');
$routes->match(['get', 'post'], 'users/edit/(:num)', 'Users::edit/$1');
