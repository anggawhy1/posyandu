<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->get('/', 'Home::index');
$routes->get('/dokumentasi', 'Home::dokumentasi');
$routes->get('/input-data', 'Home::inputData');
$routes->get('/data-balita', 'Home::dataBalita');
$routes->get('/data-lansia', 'Home::dataLansia');
$routes->get('/data-remaja', 'Home::dataRemajaPutri');
$routes->get('/data-ibu-hamil', 'Home::dataIbuHamil');
$routes->get('/data-usia-produktif', 'Home::dataUsiaProduktif');
$routes->get('/kontak', 'Home::kontak');
$routes->get('/login', 'Home::login');
$routes->post('/login', 'AuthController::login');  // Menangani form login
$routes->get('/dashboard/admin', 'AdminController::index'); // Halaman dashboard admin

// Routing untuk Admin Dashboard
$routes->get('/admin/dashboard', 'AdminController::index');
$routes->get('/admin/statistik', 'AdminController::statistik');
$routes->get('/admin/dokumentasi', 'AdminController::dokumentasi');
$routes->get('/admin/keluar', 'AuthController::logout'); // Logout

// Routing untuk Kelola Data
$routes->get('/admin/data-balita', 'AdminController::dataBalita');
$routes->get('/admin/data-ibu-hamil', 'AdminController::dataIbuHamil');
$routes->get('/admin/data-remaja', 'AdminController::dataRemajaPutri');
$routes->get('/admin/data-lansia', 'AdminController::dataLansia');
$routes->get('/admin/data-produktif', 'AdminController::dataUsiaProduktif');


$routes->post('/data-remaja/store', 'DataRemaja::store');
$routes->get('/data-remaja', 'DataRemaja::index');
$routes->post('/data-balita/store', 'DataBalita::store');
$routes->post('/data-balita', 'DataBalita::index');
$routes->get('/data-ibu-hamil', 'DataIbuHamil::index');
$routes->post('/data-ibu-hamil/store', 'DataIbuHamil::store');
$routes->get('home/testDB', 'Home::testDB');
$routes->get('/admin/dashboard', 'Dashboard::index');
$routes->get('/admin/data_lansia', 'LansiaController::index');
$routes->get('/admin/data_ibu_hamil', 'IbuHamilController::index');




