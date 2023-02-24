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
$routes->setDefaultController('Pages');
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



$routes->get('/', 'HomeController::home');


//admin
$routes->get('beranda', 'HalamanAdminController::index');
$routes->get('login', 'LoginController::index');
$routes->post('login', 'LoginController::login');

$routes->get('rekap', 'HalamanAdminController::rekap');
$routes->post('export', 'HalamanAdminController::export');
$routes->get('tentang', 'TentangController::index');
$routes->get('logout', 'LoginController::logout');

$routes->resource('datapengguna', ['controller' => 'DatapenggunaController']);
$routes->resource('pemasukan', ['controller' => 'DataPemasukanController']);
$routes->resource('pengeluaran', ['controller' => 'DatapengeluaranController']);
$routes->resource('kegiatan', ['controller' => 'KegiatanController']);
$routes->resource('artikel', ['controller' => 'ArtikelController']);
$routes->resource('artikel-management', ['controller' => 'PostManagementController']);
$routes->resource('setting', ['controller' => 'SettingController']);
$routes->post('setting/update', 'SettingController::UpdateSetting');

//user
$routes->get('profile', 'HomeController::profile');
$routes->get('manajemen', 'HomeController::manajemen');
$routes->get('blog', 'HomeController::blog');
$routes->get('post', 'HomeController::post');
$routes->get('kontak', 'HomeController::kontak');



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
