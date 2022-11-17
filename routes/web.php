<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.home');
});
Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/blog', function () {
    return view('pages.blog');
});
Route::get('/cart', function () {
    return view('pages.cart');
});
Route::get('/checkout', function () {
    return view('pages.checkout');
});
Route::get('/contact', function () {
    return view('pages.contact');
});
Route::get('/my-contact', function () {
    return view('pages.my-contact');
});
Route::get('/order', function () {
    return view('pages.order');
});
Route::get('/shop-list', function () {
    return view('pages.shop-list');
});
Route::get('/shop-sidebar', function () {
    return view('pages.sidebar');
});
Route::get('/shop', function () {
    return view('pages.shop');
});
Route::get('/product', function () {
    return view('pages.single-product');
});
Route::get('/product-sidebar', function () {
    return view('pages.single-product-sidebar');
});
Route::get('/single-blog', function () {
    return view('pages.single-blog');
});
Route::get('/blog-sidebar', function () {
    return view('pages.single-blog-sidebar');
});
Route::get('/wishlist', function () {
    return view('pages.wishlist');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
