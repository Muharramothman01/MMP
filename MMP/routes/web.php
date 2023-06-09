<?php

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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::namespace('UserController')->group(function (){
    Route::get('/home','ProductController@showProducts')->name('home');
});

Route::group(['prefix'=>'/'],function (){
    Route::get('Xiaomi','UserController\CategoryController@showXiaomi');
    Route::get('Oppo','UserController\CategoryController@showOppo');
    Route::get('Pixel','UserController\CategoryController@showPixel');
    Route::get('Samsung','UserController\CategoryController@showSamsung');
    Route::get('Apple','UserController\CategoryController@showIPhones');
    Route::get('Search','UserController\ProductController@searchProduct')->name('search');
});

Route::resource('admin', 'AdminController');

Route::group(['prefix'=>'/cart'],function(){
    Route::get('', [App\Http\Controllers\UserController\CartController::class, 'index'])->name('cart.index');
    Route::get('store/{id}', [App\Http\Controllers\UserController\CartController::class, 'store'])->name('cart.store');
    Route::get('/{id}', [App\Http\Controllers\UserController\CartController::class, 'destroy'])->name('cart.destroy');
});

Route::get('/payment','UserController\PaymentController@index')->name('payment.index');
Route::post('/payment/credit','UserController\PaymentController@credit')->name('payment.credit');
