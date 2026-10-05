<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// ---------- Public ----------
$routes->get('/', 'Pages::landing');
$routes->get('about', 'Pages::about');

$routes->get('login',  'Auth::login');
$routes->post('login', 'Auth::attempt');
$routes->get('logout', 'Auth::logout');

// ---------- Protected (login required) ----------
$routes->group('', ['filter' => 'auth'], static function ($routes) {

    // Customer Accounts
    $routes->get('customers', 'Customers::index');
    $routes->get('customers/new', 'Customers::new');
    $routes->post('customers/new', 'Customers::create');
    $routes->get('customers/edit/(:num)', 'Customers::edit/$1');
    $routes->post('customers/edit/(:num)', 'Customers::update/$1');

    // User Accounts
    $routes->get('users', 'Users::index');
    $routes->get('users/new', 'Users::new');
    $routes->get('users/create', 'Users::new');
    $routes->post('users/new', 'Users::create');
    $routes->post('users/create', 'Users::create');
    $routes->get('users/edit/(:num)', 'Users::edit/$1');
    $routes->post('users/edit/(:num)', 'Users::update/$1');
    $routes->post('users/update/(:num)', 'Users::update/$1');
});