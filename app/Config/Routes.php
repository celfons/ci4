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

 $routes->get('/', 'CustomerController::index');

$routes->get('/customers', 'CustomerController::index', ['filter' => 'authFilter']);
$routes->add('/customers/add', 'CustomerController::index');
$routes->add('/customers/insert', 'CustomerController::index');
$routes->add('/customers/insert_validation', 'CustomerController::index');
$routes->add('/customers/update/(:num)', 'CustomerController::index');
$routes->add('/customers/update_validation/(:num)', 'CustomerController::index');
$routes->add('/customers/success/(:num)', 'CustomerController::index');
$routes->add('/customers/edit/(:num)', 'CustomerController::index');
$routes->add('/customers/delete/(:num)', 'CustomerController::index');
$routes->add('/customers/delete_multiple', 'CustomerController::index');
$routes->add('/customers/ajax_list', 'CustomerController::index');
$routes->add('/customers/export', 'CustomerController::index');
$routes->add('/customers/print', 'CustomerController::index');

$routes->get('/service-order', 'ServiceOrderController::index', ['filter' => 'authFilter']);
$routes->add('/service-order/add', 'ServiceOrderController::index');
$routes->add('/service-order/insert', 'ServiceOrderController::index');
$routes->add('/service-order/insert_validation', 'ServiceOrderController::index');
$routes->add('/service-order/update/(:num)', 'ServiceOrderController::index');
$routes->add('/service-order/update_validation/(:num)', 'ServiceOrderController::index');
$routes->add('/service-order/success/(:num)', 'ServiceOrderController::index');
$routes->add('/service-order/edit/(:num)', 'ServiceOrderController::index');
$routes->add('/service-order/delete/(:num)', 'ServiceOrderController::index');
$routes->add('/service-order/delete_multiple', 'ServiceOrderController::index');
$routes->add('/service-order/ajax_list', 'ServiceOrderController::index');
$routes->add('/service-order/export', 'ServiceOrderController::index');
$routes->add('/service-order/print', 'ServiceOrderController::index');

$routes->group('auth', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->add('login', 'Auth::login');
	$routes->get('logout', 'Auth::logout');
	$routes->add('forgot_password', 'Auth::forgot_password');
	$routes->get('/', 'Auth::index', ['filter' => 'authFilter']);
	$routes->add('create_user', 'Auth::create_user', ['filter' => 'authFilter']);
	$routes->add('edit_user/(:num)', 'Auth::edit_user/$1', ['filter' => 'authFilter']);
	$routes->add('create_group', 'Auth::create_group', ['filter' => 'authFilter']);
	$routes->get('activate/(:num)', 'Auth::activate/$1', ['filter' => 'authFilter']);
	$routes->get('activate/(:num)/(:hash)', 'Auth::activate/$1/$2', ['filter' => 'authFilter']);
	$routes->add('deactivate/(:num)', 'Auth::deactivate/$1', ['filter' => 'authFilter']);
	$routes->get('reset_password/(:hash)', 'Auth::reset_password/$1', ['filter' => 'authFilter']);
	$routes->post('reset_password/(:hash)', 'Auth::reset_password/$1', ['filter' => 'authFilter']);
});