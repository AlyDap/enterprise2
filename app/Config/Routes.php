<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->setAutoRoute(true);

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
$routes->get('/', 'Home::index'); //INI LOGIN
$routes->get('/logout', 'Home::logout'); //INI LOGIN

$routes->get('/dashboard', 'Dashboard::index'); //INI DASHBOARD


// BOSSS
$routes->get('/produk', 'Bos::produk');
$routes->get('/mitra', 'Bos::mitra');
$routes->get('/bahan', 'Bos::bahan');
$routes->get('/bahan/createbahan', 'Bos::createBahan');
$routes->post('/bahan/storebahan', 'Bos::storeBahan');
$routes->get('/bahan/editbahan/(:num)', 'Bos::editBahan/$1');
$routes->post('/bahan/updatebahan', 'Bos::updateBahan');
$routes->get('/mitra/createmitra', 'Bos::createMitra');
$routes->post('/mitra/storemitra', 'Bos::storeMitra');
$routes->get('/mitra/editmitra/(:num)', 'Bos::editMitra/$1');
$routes->post('/mitra/updatemitra', 'Bos::updateMitra');
$routes->get('/produk/createproduk', 'Bos::createProduk');
$routes->post('/produk/storeproduk', 'Bos::storeProduk');
$routes->get('/produk/editproduk/(:num)', 'Bos::editProduk/$1');
$routes->post('/produk/updateproduk', 'Bos::updateProduk');
$routes->get('/produk/detailproduk/(:num)', 'Bos::detailProduk/$1');
// penjualan
$routes->get('/penjualan/detailpenjualan/(:num)', 'Penjualan::detailPenjualan/$1');
// penjahitan
$routes->get('/produksi/detailpenjahitan/(:num)', 'Produksi::detailPenjahitan/$1');
// $routes->get('/tampol', 'Sales::penjualan');

$routes->get('/penjualan/tambahpenjualan', 'Penjualan::tambahPenjualan');
$routes->post('/penjualan/storepenjualan', 'Bos::storePenjualan');

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
