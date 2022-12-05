<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\HomeCarousel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeCarouselController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Models\About;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\CategoryBlog;
use App\Models\Job;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
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
    $blogs = Blog::latest()->limit(2)->get();
    $products_footer = Product::inRandomOrder()->limit(2)->get();
    // dd(explode('-',$blogs[0]->created_at->toDateString()));
    return view('pages.home',compact('sliders','new','carousels','favorite','blogs','products_footer'));
})->name('home');

Route::get('/about', function () {
    $banner = Banner::all()->where('section','about')->first();
    $boss = User::where('job_id',1)->first();
    $content =  About::first();
    $employee =  User::all()
    ->where('job_id','!=',1)
    ->random(3);
    return view('pages.about',compact('banner','boss','employee','content'));
});



Route::get('/blog', function () {
    $blogs = Blog::paginate(3);
    $banner = Banner::all()->where('section','blog')->first();
    $categories = CategoryBlog::all();
    return view('pages.blog',compact('banner','blogs','categories'));
});
Route::get('/blog/category/{id}', function ($id) {
    $blogs = Blog::where('category_blogs_id',$id)->paginate(3);
    $banner = Banner::all()->where('section','blog')->first();
    $categories = CategoryBlog::all();
    return view('pages.blog',compact('banner','blogs','categories'));
});



Route::get('/cart', function () {
    $banner = Banner::all()->where('section','cart')->first();
    return view('pages.cart',compact('banner'));
});

Route::get('/checkout', function () {
    return view('pages.checkout');
});
Route::get('/contact', function () {
    $banner = Banner::all()->where('section','contact')->first();
    return view('pages.contact',compact('banner'));
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
    $banner = Banner::all()->where('section','lookbook')->first();
    return view('pages.shop-list',compact('products','category','banner'));
});



Route::get('/shop-list/category/{id}',function($id){
    $products = DB::table('products')->where('categorie_id',$id)->paginate(3);
    $category = Categorie::all();
    $banner = Banner::all()->where('section','lookbook')->first();
    return view('pages.shop-list',compact('products','category','banner'));
});


Route::get('/shop-list/size/{name}',function($name){
    $products = DB::table('products')->where('size',$name)->paginate(3);
    $category = Categorie::all();
    $banner = Banner::all()->where('section','lookbook')->first();
    return view('pages.shop-list',compact('products','category','banner'));
});
Route::get('/shop-list/search',function(Request $request){
    $products = DB::table('products')->where('title','like','%' . $request->search_text . '%')->paginate(3);
    $category = Categorie::all();
    $banner = Banner::all()->where('section','lookbook')->first();
    return view('pages.shop-list',compact('products','category','banner'));
});

Route::get('/backoffice/category/{id}',function($id){
    $products = DB::table('products')->where('categorie_id',$id)->paginate(3);
    $categories = Categorie::all();
    return view('pages.backoffice.pages.products', compact('products','categories'));
});

Route::get('/connection ', function(){
    return view('pages.login');
});

// Route::get('/shop-sidebar', function () {
//     return view('pages.shop-sidebar');
// });
Route::get('/shop', function () {
    $products = Product::paginate(5);
    $categories = Categorie::all();
    $banner = Banner::all()->where('section','shop')->first();
    return view('pages.shop',compact('products','categories','banner'));
});

Route::get('/product/{id}',[ProductController::class,'show']);

Route::get('/product-sidebar', function () {
    return view('pages.single-product-sidebar');
});
Route::get('/blog/{id}', function ($id) {
    $blog = Blog::find($id);
    $reviews = Review::where('blog_id',$id)->get();
    return view('pages.single-blog',compact('blog','reviews'));
});


Route::post('/blog/store/review/{id}',[ReviewController::class,'store']);
Route::delete('/delete/review/{id}',[ReviewController::class,'destroy']);


// Route::get('/blog-sidebar', function () {
//     return view('pages.single-blog-sidebar');
// });
Route::get('/wishlist', function () {
    return view('pages.wishlist');
});

Route::post('/product/cart/store/{id}',[CartController::class,'store']);
Route::delete('/product/cart/delete/{id}',[CartController::class,'destroy']);


Route::put('/store/user/info',[UserController::class,'update']);

// ------- BACKOFFICE ------
Route::get('/backoffice/products',[ProductController::class,'index'])->name('backoffice-products');
Route::delete('/delete/product/{id}',[ProductController::class,'destroy']);

Route::get('/backoffice', function () {
    $carousels = HomeCarousel::all();
    $about = About::first();
    return view('pages.backoffice.pages.backoffice',compact('carousels','about'));
});

Route::get('/backoffice/users',[UserController::class,'index'])->name('backoffice-users');
Route::put('/update/role/{id}',[UserController::class,'updateRole']);
Route::put('/update/job/{id}',[UserController::class,'updateJob']);


Route::get('/create/product',[ProductController::class,'create']);
Route::post('/store/product',[ProductController::class,'store']);
Route::get('/edit/product/{id}',[ProductController::class,'edit']);
Route::put('/update/product/{id}',[ProductController::class,'update']);

Route::post('/store/caroussel-item',[HomeCarouselController::class,'store']);
Route::delete('/delete/carousel-item/{id}',[HomeCarouselController::class,'destroy']);

Route::get('/backoffice/teams', function(){
    $teams = User::where('job_id', '!=' , null)->get();
    $jobs = Job::all();
    return view('pages.backoffice.pages.teams',compact('teams','jobs'));
})->name('backoffice-teams');

Route::put('/backoffice/update/banner/{id}',[BannerController::class,'update']);

Route::get('/backoffice/banners',function(){
    $banners = Banner::all();
    return view('pages.backoffice.pages.banners',compact('banners'));
})->name('banners');

Route::get('/backoffice/create/blog',[BlogController::class,'create'])->name('create-blog');
Route::get('/backoffice/blogs',[BlogController::class,'index'])->name('backoffice-blogs');
Route::get('/backoffice/edit/blog/{id}',[BlogController::class,'edit'])->name('edit-blog');
Route::post('/store/blog',[BlogController::class,'store']);
Route::delete('/delete/blog/{id}',[BlogController::class,'destroy']);
Route::put('/update/blog/{id}',[BlogController::class,'update']);

Route::put('/backoffice/update/about',[AboutController::class,'update']);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
