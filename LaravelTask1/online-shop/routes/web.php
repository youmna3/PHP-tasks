<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CartController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/add-product', [HomeController::class, 'add_product']);
Route::get('/add-favorite', [HomeController::class, 'addToFavorite']);
Route::get('/cart', [CartController::class, 'cart']);
Route::get('/inc-product', [CartController::class, 'incQuan']);
Route::get('/dec-product', [CartController::class, 'decQuan']);
Route::get('/remove-product', [CartController::class, 'delete']);
Route::get('/checkout', [HomeController::class, 'checkOut']);
Route::post('/add_order', [HomeController::class, 'post_order']);
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendMessage']);
Route::get('/details', [DetailsController::class, 'index']);
Route::get('/details/{id}', [DetailsController::class, 'index']);
Route::post('/details/{id}', [DetailsController::class, 'postReview']);






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

Route::middleware(['auth', 'can:is_admin'])->prefix('/admin')->group(function () {
    Route::get('', [AdminController::class, 'admin']);
    Route::resource('products', ProductsController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('orders', OrdersController::class);
    Route::get('users', [AdminController::class, 'users'])->name('admin.users');


});