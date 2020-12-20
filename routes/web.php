<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ProductsController@index');

Route::post('/products', 'ProductsController@store');

Route::get('/search', 'SearchController@index');
