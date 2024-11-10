<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [CustomerController::class, 'loginPage']);
Route::get('/register', [CustomerController::class, 'registerPage']);
Route::get('/logout', [CustomerController::class, 'customerLogout']);
Route::post('/customer-dashboard', [CustomerController::class, 'customerDashboard']);
Route::get('/index', [CustomerController::class, 'showIndex']);
Route::post('/customer-register', [CustomerController::class, 'customerRegister']);
Route::get('/all-customer', [CustomerController::class, 'allCustomer']);

Route::get('/admin-login', [AdminController::class, 'loginAdminPage']);
Route::get('/admin-logout', [AdminController::class, 'adminLogout']);
Route::post('/admin-dashboard', [AdminController::class, 'adminDashboard']);
Route::get('/dashboard', [AdminController::class, 'showAdminIndex']);
Route::get('/welcome-admin', [AdminController::class, 'dashboardPage']);

Route::get('/products', [ProductsController::class, 'productsPage']);
Route::get('/products/{cate_id}', [ProductsController::class, 'filterByCategory'])->name('filter.category');
Route::get('/add-product-page', [ProductsController::class, 'addProductPage']);
Route::post('/save-product', [ProductsController::class, 'save_product']);
Route::get('/all-products', [ProductsController::class, 'allProductPage']);
Route::get('/edit-product/{product_id}', [ProductsController::class, 'editProductPage']);
Route::post('/update-product/{product_id}', [ProductsController::class, 'update_product']);
Route::get('/delete-product/{product_id}', [ProductsController::class, 'delete_product']);
Route::get('/product-detail/{product_id}', [ProductsController::class, 'productDetail']);


Route::get('/add-collection-page', [CollectionController::class, 'addCollectionPage']);
Route::get('/all-collection', [CollectionController::class, 'allCollectionPage']);
Route::post('/save-collection', [CollectionController::class, 'save_collection']);


Route::get('/cart', [CartController::class, 'showCart']);
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');

Route::get('/order', [OrderController::class, 'orderPage']);
Route::post('/confirm-order', [OrderController::class, 'confirm_order']);
Route::get('/thank-you', [OrderController::class, 'thankyouPage']);
Route::get('/all-order', [OrderController::class, 'showOrder']);
Route::get('/view-order/{order_code}', [OrderController::class, 'view_order']);


Route::get('/collection/{collection_id}', [CollectionController::class, 'collectionPage']);

