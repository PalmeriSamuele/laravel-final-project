<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
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
    $sliders = Product::inRandomOrder()->limit(5)->get();
    $new = Product::latest()->first();
    return view('pages.home',compact('sliders','new'));
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
    $products = Product::all();
    return view('pages.shop-list',compact('products'));
});



Route::get('/shop-sidebar', function () {
    return view('pages.shop-sidebar');
});
Route::get('/shop', function () {
    return view('pages.shop');
});

Route::get('/product/{id}',[ProductController::class,'show']);

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
// ------- BACKOFFICE ------
Route::get('/products',[ProductController::class,'index']);
Route::delete('/delete/product/{id}',[ProductController::class,'destroy']);

Route::get('/backoffice', function () {
    return view('pages.backoffice.pages.backoffice');
});

Route::get('/create/product',[ProductController::class,'create']);
Route::post('/store/product',[ProductController::class,'store']);
Route::get('/edit/product/{id}',[ProductController::class,'edit']);
Route::put('/update/product/{id}',[ProductController::class,'update']);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
