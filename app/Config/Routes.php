<?php

use CodeIgniter\Router\RouteCollection;

/** 
 * @var RouteCollection $routes
 */

 $routes->setDefaultNamespace('App\Controllers');
 $routes->setDefaultController('Home');
 $routes->setDefaultMethod('index');
 $routes->setTranslateURIDashes(false);
 $routes->set404Override();
 $routes->setAutoRoute(false);
 
 $routes->get('/', 'Home::index');
 $routes->get('/customers', 'Examples::customers');
 $routes->add('/customers/add', 'Examples::customers');
 $routes->add('/customers/insert', 'Examples::customers');
 $routes->add('/customers/insert_validation', 'Examples::customers');
 $routes->add('/customers/update/(:num)', 'Examples::customers');
 $routes->add('/customers/update_validation/(:num)', 'Examples::customers');
 $routes->add('/customers/success/(:num)', 'Examples::customers');
 $routes->add('/customers/edit/(:num)', 'Examples::customers');
 $routes->add('/customers/delete/(:num)', 'Examples::customers');
 $routes->add('/customers/delete_multiple', 'Examples::customers');
 $routes->add('/customers/ajax_list', 'Examples::customers');
 $routes->add('/customers/export', 'Examples::customers');
 $routes->add('/customers/print', 'Examples::customers');

$routes->group('auth', ['namespace' => 'IonAuth\Controllers'], function ($routes) {
    $routes->add('login', 'Auth::login');
	$routes->get('logout', 'Auth::logout');
	$routes->add('forgot_password', 'Auth::forgot_password');
	// $routes->get('/', 'Auth::index');
	// $routes->add('create_user    ', 'Auth::create_user');
	// $routes->add('edit_user/(:num)', 'Auth::edit_user/$1');
	// $routes->add('create_group', 'Auth::create_group');
	// $routes->get('activate/(:num)', 'Auth::activate/$1');
	// $routes->get('activate/(:num)/(:hash)', 'Auth::activate/$1/$2');
	// $routes->add('deactivate/(:num)', 'Auth::deactivate/$1');
	// $routes->get('reset_password/(:hash)', 'Auth::reset_password/$1');
	// $routes->post('reset_password/(:hash)', 'Auth::reset_password/$1');
	// ...
});