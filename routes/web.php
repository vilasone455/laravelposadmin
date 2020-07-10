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


Route::get('/products', 'ProductController@index');

Route::get('/products{id}', 'ProductController@show');

Route::post("/products" , "ProductController@insertproduct");

Route::put("products{id}" , "ProductController@update");

Route::delete("products{id}" , "ProductController@delete");
