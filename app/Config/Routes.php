<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'HomeController::index', ['filter' => 'noauth']);
$routes->get('login', 'Admin/UsersController::index', ['filter' => 'noauth']);
$routes->get('logout', 'Admin/UsersController::logout');
$routes->match(['get','post'],'login', 'Admin/UsersController::index', ['filter' => 'noauth']);
$routes->match(['get','post'],'register', 'Admin/UsersController::register', ['filter' => 'noauth']);
$routes->match(['get','post'],'profile', 'Admin/UsersController::profile',['filter' => 'auth']);
$routes->get('dashboard', 'Admin/DashboardController::index',['filter' => 'auth']);

$routes->get('pages', 'Admin/PagesController::index',['filter' => 'auth']);
$routes->get('pages/create', 'Admin/PagesController::create',['filter' => 'auth']);
$routes->get('pages/edit/(:num)', 'Admin/PagesController::edit',['filter' => 'auth']);
$routes->get('pages/delete/(:num)', 'Admin/PagesController::delete',['filter' => 'auth']);
$routes->match(['get','post'],'pages/create', 'Admin/PagesController::create',['filter' => 'auth']);
$routes->match(['get','post'],'pages/edit/(:num)', 'Admin/PagesController::edit',['filter' => 'auth']);
$routes->match(['get','post'],'pages/delete/(:num)', 'Admin/PagesController::delete',['filter' => 'auth']);

$routes->get('menus', 'Admin/MenusController::index',['filter' => 'auth']);
$routes->get('gallery', 'Admin/GalleriesController::index',['filter' => 'auth']);
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
