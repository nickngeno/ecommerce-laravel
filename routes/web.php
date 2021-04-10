<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('login', function(){
    return view('login');
});

Route::get('register', function(){
    return view('register');
});
Route::get('/',[ProductController::class, 'index'] );
Route::post('/login',[UserController::class, 'login'] );
Route::get('/products', [ProductController::class, 'index']);
Route::get('/productdetail/{id}', [ProductController::class, 'productdetail']);
Route::post('/search', [ProductController::class, 'search']);
Route::post('addtocart', [ProductController::class, 'addtocart']);
Route::get('mycart', [ProductController::class, 'mycart']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/removefromcart/{id}', [ProductController::class, 'removefromcart']);
Route::get('/checkout', [ProductController::class, 'checkout']);
Route::post('/ordernow', [ProductController::class, 'orderNow']);
Route::get('/orders', [ProductController::class, 'myOrders']);
Route::post('/register', [UserController::class, 'register']);