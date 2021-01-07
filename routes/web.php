<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ProductsController@index');
Route::post('/products', 'ProductsController@store');
Route::delete('/products/{product}', 'ProductsController@destory');

Route::post('/products/{product}/sold', 'ProductsTotalController@update');

Route::get('/reports', 'ReportsController@index');

Route::get('/search', 'SearchController@index');
