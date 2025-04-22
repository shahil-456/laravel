<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\user\HomeController;
use App\Http\Middleware\Auth;
use App\Http\Controllers\user\ProductController;
use App\Http\Controllers\admin\AdminHomeController;



use Inertia\Inertia;


$base_url='user';



// Route::get('/student/home', [HomeController::class, 'welcomes']);





Route::get('/test', fn () => Inertia::render('Test'));

Route::post('/messages', [TestController::class, 'store']);
Route::get('/messages', [TestController::class, 'index']);





Route::get('/', function () {
    return Inertia::render('Home');
});


Route::get($base_url.'/test', [TestController::class, 'hello']);



Route::post($base_url.'/submit', [TestController::class, 'submitForm']);


Route::get($base_url.'/login', [LoginController::class, 'login']);




Route::get($base_url.'/signup', [LoginController::class, 'signup'])->name('signup');



Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/register', [LoginController::class, 'register'])->name('register');




Route::post('/login_form', [LoginController::class, 'submit'])->name('login_form');

Route::post('/admin_login', [LoginController::class, 'adminSubmit'])->name('admin_login');



Route::get('/logout', [LoginController::class, 'logout'])->name('logout');




Route::get('/index', [LoginController::class, 'landing_page'])->name('landing');


Route::get('/products', [LoginController::class, 'products'])->name('products');




Route::get('/product-details/{id}', [LoginController::class, 'productDetails'])->name('product-details');




Route::get('/admin/login', [LoginController::class, 'admin_login']);






// Route::get('/student/home_s', [HomeController::class, 'welcomes'])->name('home');


// Route::middleware([Auth::class])->group(function () {
//    
//    
//    



//  });



Route::post('/admin/submit', [LoginController::class, 'adminSubmit'])->name('admin_submit');


Route::middleware(['auth:admin'])->group(function () {


    Route::get('/verify-user/{id}', [HomeController::class, 'test']);

    Route::get('/admin/home', [AdminHomeController::class, 'home'])->name('admin_home');

});



 Route::middleware(['auth'])->group(function () {

    // Route::get('/admin/home', [AdminHomeController::class, 'home'])->name('admin_home');


    // Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/user/home', [HomeController::class, 'home'])->name('home');

    Route::get('/user/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/user/home1', [HomeController::class, 'home'])->name('homea');


    Route::get('/user/add-product', [ProductController::class, 'add_product'])->name('add-product');


    Route::post('/profile/update', [HomeController::class, 'updateProfile'])->name('profile.update');


    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');


    // Route::get('user/product/details/{id}', [ProductController::class, 'details'])->name('product.show');






});
