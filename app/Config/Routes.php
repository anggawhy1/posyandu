<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->get('/', 'Home::index');
$routes->get('beranda', 'Home::index');

// // Dokumentasi
// $routes->get('dokumentasi', 'Dokumentasi::index');
// $routes->get('dokumentasi/page/2', 'Dokumentasi::page2');
$routes->get('/dokumentasi', 'Dokumentasi::index'); // Halaman user
$routes->get('/admin/dokumentasi', 'Dokumentasi::admin'); // Halaman admin
$routes->post('/admin/dokumentasi/store', 'Dokumentasi::store'); // Proses tambah dokumentasi
$routes->post('/admin/dokumentasi/delete/(:num)', 'Dokumentasi::delete/$1'); // Hapus dokumentasi berdasarkan ID
$routes->get('/admin/dokumentasi/create', 'Dokumentasi::create'); // Tambah dokumentasi (halaman form)
$routes->get('/admin/dokumentasi/edit/(:num)', 'Dokumentasi::edit/$1');
$routes->post('/admin/dokumentasi/update/(:num)', 'Dokumentasi::update/$1');



// Halaman Umum
// $routes->get('/jadwal', 'Home::jadwal');
$routes->get('/jadwal', 'Jadwal::index'); // Halaman user
$routes->get('/admin/jadwal', 'Jadwal::admin'); // Halaman admin
$routes->get('/admin/jadwal/create', 'Jadwal::create'); // Form tambah jadwal
$routes->post('/admin/jadwal/store', 'Jadwal::store'); // Proses tambah jadwal
$routes->post('/admin/jadwal/delete/(:num)', 'Jadwal::delete/$1'); // Hapus jadwal berdasarkan ID


$routes->get('/input-data', 'InputData::index');
$routes->get('/data-balita', 'DataBalita::index');
$routes->get('/data-remaja', 'DataRemaja::index');
$routes->get('/data-ibu-hamil', 'DataIbuHamil::index');
$routes->get('/data-usia-produktif', 'Home::dataUsiaProduktif');
$routes->get('/kontak', 'Home::kontak');
$routes->get('/login', 'Home::login');
$routes->post('/login', 'AuthController::login'); // Menangani form login

// Admin Dashboard
// $routes->get('/admin/dashboard', 'AdminController::index');
$routes->get('/admin/dashboard', 'Dashboard::index');

$routes->get('/admin/statistik', 'AdminController::statistik');
$routes->get('/admin/dokumentasi', 'AdminController::dokumentasi');
$routes->get('/admin/keluar', 'AuthController::logout'); // Logout

// Kelola Data Admin
// $routes->get('/admin/data-balita', 'AdminController::dataBalita');
$routes->get('/admin/data-balita', 'BalitaController::index');
// $routes->get('/admin/data-lansia', 'AdminController::dataLansia');
$routes->get('/admin/data-lansia', 'LansiaController::index');
$routes->get('/admin/data-ibu-hamil', 'IbuHamilController::index');
$routes->get('/admin/data-remaja-putri', 'RemajaPutriController::index');
$routes->get('/admin/data-usia-produktif', 'UsiaProduktifController::index');



// $routes->get('/admin/pemantauan-balita', 'AdminController::pemantauanBalita');
// $routes->get('/admin/data-ibu-hamil', 'AdminController::dataIbuHamil');
// $routes->get('/admin/data-remaja', 'AdminController::dataRemajaPutri');
// $routes->get('/admin/data-produktif', 'AdminController::dataUsiaProduktif');
// $routes->get('/admin/data-baru', 'AdminController::dataBaru');
// $routes->get('/admin/riwayat-data', 'AdminController::riwayatData');
// $routes->get('/admin/jadwal', 'AdminController::jadwal');

// Store Data
$routes->post('/data-remaja/store', 'DataRemaja::store');
$routes->post('/data-balita/store', 'DataBalita::store');
$routes->post('/data-ibu-hamil/store', 'DataIbuHamil::store');

// Pengujian Database
$routes->get('home/testDB', 'Home::testDB');

// Data Lansia & Ibu Hamil (Controller Khusus)
$routes->get('/admin/data_lansia', 'LansiaController::index');
$routes->get('/admin/data_ibu_hamil', 'IbuHamilController::index');




