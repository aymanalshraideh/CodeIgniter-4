<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/admin', 'Home::indexAdmin');

$routes->get('/brands', 'BrandsController::index',['filter' => 'authAdmin']);
$routes->get('/Dashboard', 'BrandsController::admin',['filter' => 'authAdmin']);
// $routes->get('/brands', 'BrandsController::view',['filter' => 'authGuard']);
// $routes->get('/', 'SignupController::index');
$routes->get('/signup', 'SignupController::index',['filter' => 'authlogin']);
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index',['filter' => 'authlogin']);
$routes->get('logout', 'SigninController::logout');
// $routes->get('/profile', 'ProfileController::index',['filter' => 'authAdmin']);
$routes->post('brandstore','BrandsController::brand_add',['filter' => 'authAdmin']);
$routes->get('/fetchdata', 'BrandsController::fetch',['filter' => 'authAdmin']);
$routes->get('/ajax_edit/(:any)', 'BrandsController::ajax_edit/$1',['filter' => 'authAdmin']);
$routes->post('brandedit','BrandsController::brand_update',['filter' => 'authAdmin']);
$routes->post('brand_delete/(:any)','BrandsController::brand_delete/$1',['filter' => 'authAdmin']);
// Categories
$routes->get('/categories', 'CategoriesController::index',['filter' => 'authAdmin']);

$routes->post('categorystore','CategoriesController::category_add',['filter' => 'authAdmin']);
$routes->get('/fetchcategory', 'CategoriesController::fetch',['filter' => 'authAdmin']);
$routes->get('/ajax_edit_category/(:any)', 'CategoriesController::ajax_edit/$1',['filter' => 'authAdmin']);
$routes->post('categoryedit','CategoriesController::category_update',['filter' => 'authAdmin']);
$routes->post('category_delete/(:any)','CategoriesController::category_delete/$1',['filter' => 'authAdmin']);
//Products

$routes->get('/products', 'ProductsController::index',['filter' => 'authAdmin']);
$routes->post('productstore','ProductsController::product_add',['filter' => 'authAdmin']);
$routes->get('/fetchproducts', 'ProductsController::fetch');
$routes->get('/ajax_edit_product/(:any)', 'ProductsController::ajax_edit/$1',['filter' => 'authAdmin']);
$routes->post('productedit','ProductsController::product_update',['filter' => 'authAdmin']);
$routes->post('product_delete/(:any)','ProductsController::product_delete/$1',['filter' => 'authAdmin']);

//Home 



$routes->get('/', 'Home::index');
$routes->get('/ss', 'Home::single');
$routes->get('singleProduct/(:any)', 'Home::single/$1');
$routes->get('/fetchhome', 'Home::fetch');
$routes->get('/allproduct', 'Home::allProduct');
$routes->get('/allbrands', 'Home::allBrands');



//wish
$routes->post('/addwish/(:any)/(:any)/(:any)/(:any)','WishController::wishadd/$1/$2/$3/$4',['filter' => 'authGuard']);
$routes->get('/wishlist', 'WishController::index',['filter' => 'authGuard']);
$routes->get('/fetchwish', 'WishController::wishfetch',['filter' => 'authGuard']);
$routes->post('wishdelete/(:any)/(:any)','WishController::wish_delete/$1/$2',['filter' => 'authGuard']);


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
