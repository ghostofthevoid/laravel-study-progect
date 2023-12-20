<?php

use Illuminate\Support\Facades\Auth;
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

Route::namespace('App\\Http\\Controllers\\Product')->group(function () {
    Route::get('/products', 'IndexController')->name('product.index');
    Route::post('/products', 'StoreController')->name('product.store');
    Route::get('/products/create', 'CreateController')->name('product.create');

    Route::get('/products/{product}', 'ShowController')->name('product.show');
    Route::get('/products/{product}/edit', 'EditController')->name('product.edit');
    Route::patch('/products/{product}', 'UpdateController')->name('product.update');
    Route::delete('/products/{product}', 'DestroyController')->name('product.destroy');

    Route::get('/products/{product}/restore', 'RestoreController');
});


Route::namespace('App\\Http\\Controllers\\Admin\\Product')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/product', 'IndexController@index')->name('admin.product.index');
        Route::prefix('categories')->group(function () {
            Route::get('/category', 'CategoryController@index')->name('admin.category.index');
            Route::get('/create', 'CategoryController@create')->name('admin.category.create');
            Route::post('/', 'CategoryController@store')->name('admin.category.store');
            Route::get('/{category}', 'CategoryController@show')->name('admin.category.show');
            Route::get('/{category}/edit', 'CategoryController@edit')->name('admin.category.edit');
            Route::patch('/{category}', 'CategoryController@update')->name('admin.category.update');
        });
    });
});


Route::namespace('App\\Http\\Controllers')->group(function () {
    Route::get('/main', 'MainController@index')->name('main.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
