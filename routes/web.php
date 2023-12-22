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


Route::namespace('App\\Http\\Controllers\\Admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('categories')->group(function () {
            Route::get('/category', 'CategoryController@index')->name('admin.category.index');
            Route::get('/create', 'CategoryController@create')->name('admin.category.create');
            Route::post('/', 'CategoryController@store')->name('admin.category.store');
            Route::get('/{category}', 'CategoryController@show')->name('admin.category.show');
            Route::get('/{category}/edit', 'CategoryController@edit')->name('admin.category.edit');
            Route::patch('/{category}', 'CategoryController@update')->name('admin.category.update');
            Route::delete('/{category}', 'CategoryController@delete')->name('admin.category.delete');
        });
        Route::prefix('colors')->group(function () {
            Route::get('/color', 'ColorController@index')->name('admin.color.index');
            Route::get('/create', 'ColorController@create')->name('admin.color.create');
            Route::post('/', 'ColorController@store')->name('admin.color.store');
            Route::get('/{color}', 'ColorController@show')->name('admin.color.show');
            Route::get('/{color}/edit', 'ColorController@edit')->name('admin.color.edit');
            Route::patch('/{color}', 'ColorController@update')->name('admin.color.update');
            Route::delete('/{color}', 'ColorController@delete')->name('admin.color.delete');
        });
        Route::prefix('products')->group(function () {
            Route::get('/product', 'ProductController@index')->name('admin.product.index');
            Route::get('/create', 'ProductController@create')->name('admin.product.create');
            Route::post('/', 'ProductController@store')->name('admin.product.store');
            Route::get('/{product}', 'ProductController@show')->name('admin.product.show');
            Route::get('/{product}/edit', 'ProductController@edit')->name('admin.product.edit');
            Route::patch('/{product}', 'ProductController@update')->name('admin.product.update');
            Route::delete('/{product}', 'ProductController@delete')->name('admin.product.delete');
        });
    });
});


Route::namespace('App\\Http\\Controllers')->group(function () {
    Route::get('/main', 'MainController@index')->name('main.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
