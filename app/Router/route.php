<?php
use App\Core\Router;

use App\Controller\AuthController;
use App\Controller\MasterProdukController;
use App\Controller\PesananController;
use App\Controller\StokController;
use App\Controller\UsersController;

// Redirect route
Router::redirect("/", "/login");

// Add route
Router::add('GET', '/login', AuthController::class, "login");
Router::add('POST', '/login', AuthController::class, "loginCheck");
Router::add('GET', '/home', AuthController::class, "home");

// Resource route
Router::resource('/pesanan', PesananController::class);
Router::resource('/stok', StokController::class);

Router::resource('/master-produk', MasterProdukController::class);
Router::redirect("/master-produk/store", "/master-produk");

// Group route
Router::group('/users', UsersController::class, [
    ['GET', '', 'index'],
    ['GET', '/create', 'create'],
    ['POST', '/store', 'store'],
    ['GET', '/{id}', 'show'],
    ['GET', '/{id}/edit', 'edit'],
]);
Router::redirect("/users/store", "/users");

// Run route
Router::run();
