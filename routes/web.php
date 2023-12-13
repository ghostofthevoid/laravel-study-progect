<?php

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
    return view('welcome');
});

Route::namespace('App\\Http\\Controllers')->group(function () {
    Route::get('/products', 'ProductController@index')->name('product.index');
    Route::post('/products', 'ProductController@store')->name('product.store');
    Route::get('/products/create', 'ProductController@create')->name('product.create');

    Route::get('/products/{product}', 'ProductController@show')->name('product.show');
    Route::get('/products/{product}/edit', 'ProductController@edit')->name('product.edit');
    Route::patch('/products/{product}', 'ProductController@update')->name('product.update');
    Route::delete('/products/{product}', 'ProductController@destroy')->name('product.destroy');

    Route::get('/products/{product}/restore', 'ProductController@restore');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
