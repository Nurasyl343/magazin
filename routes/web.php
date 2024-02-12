<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;

Route::get('/', function (){
    return redirect()->route('products.index');
});


Route::middleware('auth')->group(function (){
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::post('cart/{product}/putToCart', [CartController::class, 'putToCart'])->name('cart.puttocart');
    Route::post('cart/{product}/deleteFromCart', [CartController::class, 'deleteFromCart'])->name('cart.deletefromcart');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'buy'])->name('cart.buy');

    Route::get('/orders', [CartController::class, 'orders'])->name('cart.orders');
    Route::get('/cabinet', function (){
       return view('cabinet.index');
    });

    //Admin middleware
    Route::middleware('hasrole:admin')->group(function (){
        Route::resource('/products', ProductController::class)->except('index','show');
        Route::resource('/categories', CategoryController::class)->except('index','show');

        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');

        Route::put('/admin/users/{user}/adminber', [UserController::class, 'adminber'])->name('admin.users.adminber');
        Route::put('/admin/users/{user}/userber', [UserController::class, 'userber'])->name('admin.users.userber');
    });

});

Route::resource('/products', ProductController::class)->only('index','show');
Route::resource('/categories', CategoryController::class)->only('index','show');;

Route::get('/products/category/{category}', [ProductController::class, 'productsByCategory'])->name('products.category');

//Auth::routes();
Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'create'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

