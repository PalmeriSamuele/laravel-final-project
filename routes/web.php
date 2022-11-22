<?php

use App\Models\Product;
use App\Models\Categorie;
use App\Models\HomeCarousel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeCarouselController;

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
    $carousels = HomeCarousel::all();
    $favorite = Product::where('isFavorite',1)->first();
    return view('pages.home',compact('sliders','new','carousels','favorite'));
})->name('home');

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
Route::get('/my-account', function () {
    return view('pages.my-account');
});
Route::get('/order', function () {
    return view('pages.order');
});




Route::get('/shop-list', function () {
    $products = DB::table('products')->paginate(3);
    $category = Categorie::all();
    return view('pages.shop-list',compact('products','category'));
});

Route::get('/shop-list/category/{id}',function($id){
    $products = DB::table('products')->where('categorie_id',$id)->paginate(3);
    $category = Categorie::all();
    return view('pages.shop-list',compact('products','category'));
});
Route::get('/shop-list/size/{name}',function($name){
    $products = DB::table('products')->where('size',$name)->paginate(3);
    $category = Categorie::all();
    return view('pages.shop-list',compact('products','category'));
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
    $carousels = HomeCarousel::all();
    return view('pages.backoffice.pages.backoffice',compact('carousels'));
});

Route::get('/create/product',[ProductController::class,'create']);
Route::post('/store/product',[ProductController::class,'store']);
Route::get('/edit/product/{id}',[ProductController::class,'edit']);
Route::put('/update/product/{id}',[ProductController::class,'update']);

Route::post('/store/caroussel-item',[HomeCarouselController::class,'store']);
Route::delete('/delete/carousel-item/{id}',[HomeCarouselController::class,'destroy']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
