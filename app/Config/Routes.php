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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Anasayfa::index');
$routes->get('/deneme', 'Anasayfa::index');
$routes->get('call/(:num)', 'Anasayfa::call/$1');


$routes->get('/login', 'Login::index');
$routes->post('/login/kontrol', 'Login::kontrol');

$routes->group('panel', static function ($routes) {
    $routes->get('/', 'Home::panel');
    $routes->get('category', 'Home::category');
    $routes->get('product', 'Home::urun');
    $routes->post('category_insert', 'Home::category_insert');
    $routes->get('categoryEditView/(:num)', 'Home::categoryEditView/$1');
    $routes->post('categoryEdit/(:num)', 'Home::categoryEdit/$1');
    $routes->get('categoryDelete/(:num)', 'Home::categoryDelete/$1');
    $routes->get('products_info/(:num)/(:num)', 'Home::productsInfo/$1/$2');
    $routes->get('category_info/(:num)/(:num)', 'Home::categoryInfo/$1/$2');
    $routes->get('productsDelete/(:num)', 'Home::productsDelete/$1');
    $routes->get('productsEditView/(:num)', 'Home::productsEditView/$1');
    $routes->get('callView', 'Home::call_view');
    $routes->get('callDelete/(:num)', 'Home::callDelete/$1');
    $routes->post('productEdit/(:num)', 'Home::productEdit/$1');
    $routes->post('employeInsert', 'Home::employeInsert');
    $routes->get('get-calls', 'CallController::get_calls');

    $routes->get('employeDelete/(:num)', 'Home::employeDelete/$1');

    $routes->get('employeAddView', 'Home::employeAddView');

    $routes->get('productInsertView', 'Home::productInsertView');

    $routes->get('firmalistView', 'Home::firmalistView');
    $routes->get('firmaEkleView', 'Home::firmaEkleView');
    $routes->post('firmaKaydet', 'Home::firmaKaydet');
    $routes->get('firmadelete/(:num)', 'Home::firmadelete/$1');

    $routes->get('settingsView', 'Home::settingsView');
    $routes->get('statusView', 'Home::statusView');
    $routes->post('updateStatus', 'Home::updateStatus');
    $routes->post('settingsInsert/(:num)', 'Home::settingsInsert/$1');
    $routes->post('insertProduct', 'Home::insertProduct');
    $routes->get('qrcode', 'Home::qrcode');
    $routes->get('quit', 'Home::quit');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
