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

Route::group([], function () {
    Route::get('/', 'Web\IndexController@index');
    Route::get('/list/{id}', 'Web\ListController@index');
    Route::get('/detail/{id}', 'Web\DetailController@index');
});