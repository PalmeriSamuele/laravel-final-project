<?php

use App\Models\Job;
use App\Models\Blog;
use App\Models\User;
use App\Models\About;
use App\Models\Banner;
use App\Models\Review;
use App\Models\Product;
use App\Models\Categorie;
use App\Mail\OrderShipped;
use App\Models\CategoryBlog;
use App\Models\HomeCarousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SideimageController;
use App\Http\Controllers\HomeCarouselController;
use App\Http\Controllers\OrderController;
use App\Models\Contact;
use App\Models\Order;

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

Route::middleware('check-user')->group(function(){

    Route::get('/cart', function () {
        $banner = Banner::all()->where('section','cart')->first();
        return view('pages.cart',compact('banner'));
    });
    
    Route::get('backoffice/mails',[MailController::class,'index']);
    
    Route::get('/checkout', function () {
    
        return view('pages.checkout');
    });

    Route::get('/order', function () {
        return view('pages.order');
    });
    
    Route::get('/backoffice/category/{id}',function($id){
        $products = DB::table('products')->where('categorie_id',$id)->paginate(3);
        $categories = Categorie::all();
        return view('pages.backoffice.pages.products', compact('products','categories'));
    });
    
    Route::post('/blog/store/review/{id}',[ReviewController::class,'store']);
    Route::post('/product/store/review/{id}',[ReviewController::class,'storeReviewProduct']);
    Route::delete('/delete/review/{id}',[ReviewController::class,'destroy']);


    Route::post('/product/cart/store/{id}',[CartController::class,'store']);

    Route::delete('/product/cart/delete/{id}',[CartController::class,'destroy']);
 
    Route::put('/store/user/info',[UserController::class,'update']);

    Route::get('/backoffice/products',[ProductController::class,'index'])->name('backoffice-products');
    Route::delete('/delete/product/{id}',[ProductController::class,'destroy']);

    Route::get('/backoffice', function () {
        $carousels = HomeCarousel::all();
        $about = About::first();
        $contact = Contact::first();
        return view('pages.backoffice.pages.backoffice',compact('carousels','about','contact'));
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

    Route::post('/store/sideimage/{id}',[SideimageController::class,'store']);
    Route::delete('/delete/sideimage/{id}',[SideimageController::class,'destroy']);

    Route::put('/blog/validate/{id}',[BlogController::class,'validateBlog']);

    Route::get('/backoffice/validation/blogs',function(){
        $blogs = Blog::where('isChecked',0)->get();
        return view('pages.backoffice.pages.blogValidation',compact('blogs'));
    });

    Route::put('blog/add/like/{id}',[BlogController::class,'likes'])->name('like');

    Route::get('/backoffice/orders',[OrderController::class,'index']);
    Route::delete('/delete/order/{id}',[OrderController::class,'destroy']);
    Route::put('/contact/updateform', function(Request $request){
        $request->validate([
            'country' => 'required|max:100',
            'city' => 'required|max:100',
            'adress' => 'required|max:100',
            'phone' => 'required|max:100',
     
        ]);
        $contact = Contact::all()->first();
        $contact->country = $request->country;
        $contact->city = $request->city;
        $contact->adress = $request->adress;
        $contact->phone = $request->phone;
        $contact->email = $request->email;

        $contact->save();
        return redirect()->back()->with('success','Les informations de contacte ont été modifié');
    });
    Route::get('/contact', function () {
        $banner = Banner::all()->where('section','contact')->first();
        $contact = Contact::first();
        return view('pages.contact',compact('banner','contact'));
    });
});

Route::post('/order/shipped',[MailController::class,'order'])->name('order-mail');

Route::post('/newsletter',[MailController::class,'newsletter'])->name('newsletter');
Route::post('/message',[MailController::class,'message'])->name('message');

Route::delete('/delete/mail/{id}',[MailController::class,'destroy']);

Route::get('/mail/{id}',[MailController::class,'show']);

Route::put('/mail/archive/{id}',[MailController::class,'archive']); 
Route::put('/mail/mailbox/{id}',[MailController::class,'mailbox']); 

Route::get('/backoffice/archive',[MailController::class,'archive_get']); 

Route::get('/', function () {
    $sliders = Product::inRandomOrder()->limit(5)->get();
    $new = Product::latest()->first();
    $carousels = HomeCarousel::all();
    $favorite = Product::where('isFavorite',1)->first();
    $blogs = Blog::latest()
    ->where('isChecked',1)
    ->limit(2)->get();
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

Route::get('/connection',function(){
    return view('auth.login');
});

Route::get('/blog', function () {
    $blogs = Blog::where('isChecked',1)->paginate(3);
    $banner = Banner::all()->where('section','blog')->first();
    $categories = CategoryBlog::all();
    return view('pages.blog',compact('banner','blogs','categories'));
});
Route::get('/blog/category/{id}', function ($id) {
    $blogs = Blog::where('category_blogs_id',$id)
    ->where('isChecked',1)
    ->paginate(3);
    $banner = Banner::all()->where('section','blog')->first();
    $categories = CategoryBlog::all();
    return view('pages.blog',compact('banner','blogs','categories'));
});





Route::get('/my-account', function () {
    return view('pages.my-account');
});
Route::get('/order', function () {
    Mail::to(Auth::user()->email)->send(new OrderShipped(Auth::user()));

    $order = new Order();
    $order->code = rand(1000,9000);
    $order->user_id = Auth::user()->id;
    $order->save();
    $code = $order->code;
    return view('pages.order',compact('code'));
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




Route::get('/product/{id}',[ProductController::class,'show']);

Route::get('/blog/{id}', function ($id) {
    $blog = Blog::find($id);
    $reviews = Review::where('blog_id',$id)->get();
    return view('pages.single-blog',compact('blog','reviews'));
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
