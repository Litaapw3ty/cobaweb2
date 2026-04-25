<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



// ADMIN AUTH
$routes->get('admin/login', 'Admin\Auth::login');
$routes->post('admin/login', 'Admin\Auth::loginProcess');
$routes->get('admin/logout', 'Admin\Auth::logout');


// ================= ADMIN =================
$routes->group('admin', ['filter' => 'adminAuth'], function($routes) {
    //dashboard
    $routes->get('dashboard', 'Admin\Dashboard::index');

    //kategori
    $routes->get('kategori', 'Admin\Kategori::index');
    $routes->get('kategori/create', 'Admin\Kategori::create');
    $routes->post('kategori/store', 'Admin\Kategori::store');
    $routes->get('kategori/edit/(:num)', 'Admin\Kategori::edit/$1');
    $routes->post('kategori/update/(:num)', 'Admin\Kategori::update/$1');
    $routes->get('kategori/delete/(:num)', 'Admin\Kategori::delete/$1');

    //produk
    $routes->get('produk', 'Admin\Produk::index');
    $routes->get('produk/create', 'Admin\Produk::create');
    $routes->post('produk/store', 'Admin\Produk::store');
    $routes->get('produk/edit/(:num)', 'Admin\Produk::edit/$1');
    $routes->post('produk/update/(:num)', 'Admin\Produk::update/$1');
    $routes->get('produk/delete/(:num)', 'Admin\Produk::delete/$1');

    //sub kategori
    $routes->get('sub-kategori', 'Admin\SubKategori::index'); 
    $routes->get('sub-kategori/create', 'Admin\SubKategori::create');
    $routes->post('sub-kategori/store', 'Admin\SubKategori::store');
    $routes->get('sub-kategori/delete/(:num)', 'Admin\SubKategori::delete/$1');
    $routes->get('sub-kategori/(:num)', 'Admin\SubKategori::byKategori/$1');

    //lokasi
    $routes->get('lokasi', 'Admin\Lokasi::index');

    //sewa / pesanan
    $routes->get('sewa', 'Admin\Sewa::index');
    $routes->post('sewa/konfirmasi/(:num)', 'Admin\Sewa::konfirmasi/$1');
    $routes->post('sewa/selesai/(:num)', 'Admin\Sewa::selesai/$1');

    //stok
    $routes->get('stok', 'Admin\Stok::index');
});

//koleksi coba
$routes->get('koleksi', 'User\Koleksi::index', ['filter' => 'login']);
$routes->post('koleksi/toggle', 'User\Koleksi::toggle');


// ================= USER =================
// USER SEWA
$routes->get('sewa/(:num)', 'User\Sewa::sewa/$1');
// $routes->post('sewa/bookingWA', 'User\Sewa::bookingWA');
// $routes->post('sewa/bookingWA/(:num)', 'User\Sewa::bookingWA/$1');
$routes->get('sewa/bookingWA/(:num)', 'User\Sewa::bookingWA/$1');

// // ================= USER SEWA =================
// $routes->get('user/sewa/(:num)', 'User\Sewa::sewa/$1');
// $routes->post(
//     'user/sewa/bookingWA',
//     'User\Sewa::bookingWA',
//     ['filter' => 'login'] // KHUSUS MYTH/AUTH
// );

// HOME
$routes->get('/', 'User\Home::index');

// SEARCH
$routes->get('search', 'User\Search::index');

//about us bagian pellajari lebih lanjut
$routes->get('about', 'User\Pages::about');


// PRODUK
$routes->get('produk', 'User\Produk::index');
$routes->get('produk/lokasi/(:num)', 'User\Produk::lokasi/$1');
$routes->get('produk/(:num)', 'User\Produk::detail/$1');

// ULASAN
$routes->post('ulasan/store', 'User\Ulasan::store', ['filter' => 'login']);




// ================= MYTH/AUTH ROUTES =================
// Override login route untuk menggunakan custom controller
$routes->post('login', 'AuthController::attemptLogin');

require_once ROOTPATH . 'vendor/myth/auth/src/Config/Routes.php';




// ================= KATEGORI (PALING BAWAH) =================
$routes->get('(:segment)/(:segment)', 'User\Kategori::index/$1/$2');
$routes->get('(:segment)', 'User\Kategori::index/$1');

  // SEWA / PESANAN
    $routes->get('sewa', 'Admin\Sewa::index');
    $routes->post('sewa/konfirmasi/(:num)', 'Admin\Sewa::konfirmasi/$1');
    $routes->post('sewa/selesai/(:num)', 'Admin\Sewa::selesai/$1'); 

    // STOK
    $routes->get('stok', 'Admin\Stok::index');

// KATEGORI
$routes->get('admin/kategori', 'Admin\Kategori::index');
$routes->get('admin/kategori/create', 'Admin\Kategori::create');
$routes->get('admin/kategori/edit/(:num)', 'Admin\Kategori::edit/$1');

// LOKASI
$routes->get('admin/lokasi', 'Admin\Lokasi::index');
$routes->get('admin/lokasi/create', 'Admin\Lokasi::create');
$routes->get('admin/lokasi/edit/(:num)', 'Admin\Lokasi::edit/$1');

// PRODUK
$routes->get('admin/produk', 'Admin\Produk::index');

$routes->get('/about', 'Pages::about');
