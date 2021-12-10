<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('PageController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'LoginController::index');
$routes->get('/login', 'LoginController::index');
$routes->post('/login/auth', 'LoginController::auth');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/register', 'RegisterController::index');
$routes->post('/register/save', 'RegisterController::save');

$routes->group('dashboard', ['filter' => 'auth'], function($routes){
	// Dashboard
	$routes->get('/', 'PageController::index');
    // ROute company
	$routes->get('company', 'CompanyController::index');
	$routes->get('company/(:segment)/preview', 'CompanyController::preview/$1');
    $routes->add('company/new', 'CompanyController::new');
    $routes->add('company/store', 'CompanyController::store');
	$routes->add('company/(:segment)/edit', 'CompanyController::edit/$1');
	$routes->add('company/(:segment)/update', 'CompanyController::update/$1');
	$routes->get('company/(:segment)/delete', 'CompanyController::delete/$1');
    
    // Route Skill
	$routes->get('skill', 'SkillController::index');
	$routes->get('skill/(:segment)/preview', 'SkillController::preview/$1');
    $routes->add('skill/new', 'SkillController::new');
    $routes->add('skill/store', 'SkillController::store');
	$routes->add('skill/(:segment)/edit', 'SkillController::edit/$1');
	$routes->add('skill/(:segment)/update', 'SkillController::update/$1');
	$routes->get('skill/(:segment)/delete', 'SkillController::delete/$1');

    // Route Freelancer
	$routes->get('freelancer', 'FreelancerController::index');
	$routes->get('freelancer/(:segment)/preview', 'FreelancerController::preview/$1');
    $routes->add('freelancer/new', 'FreelancerController::new');
    $routes->add('freelancer/store', 'FreelancerController::store');
	$routes->add('freelancer/(:segment)/edit', 'FreelancerController::edit/$1');
	$routes->add('freelancer/(:segment)/update', 'FreelancerController::update/$1');
	$routes->get('freelancer/(:segment)/delete', 'FreelancerController::delete/$1');

    // Route Loker
	$routes->get('loker', 'LokerController::index');
	$routes->get('loker/(:segment)/preview', 'LokerController::preview/$1');
    $routes->add('loker/new', 'LokerController::new');
    $routes->add('loker/store', 'LokerController::store');
	$routes->add('loker/(:segment)/edit', 'LokerController::edit/$1');
	$routes->add('loker/(:segment)/update', 'LokerController::update/$1');
	$routes->get('loker/(:segment)/delete', 'LokerController::delete/$1');
    
    // Route event
	$routes->get('event', 'EventController::index');
	$routes->get('event/(:segment)/preview', 'EventController::preview/$1');
    $routes->add('event/new', 'EventController::new');
    $routes->add('event/store', 'EventController::store');
	$routes->add('event/(:segment)/edit', 'EventController::edit/$1');
	$routes->add('event/(:segment)/update', 'EventController::update/$1');
	$routes->get('event/(:segment)/delete', 'EventController::delete/$1');
    
	// Route user
	$routes->get('user', 'UserController::index');
	$routes->get('user/(:segment)/delete', 'UserController::delete/$1');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
