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

Auth::routes();

Route::get('/', 'BreweryController@index')->name('breweries.index');
Route::resource('/breweries', 'BreweryController')->except(['index', 'show'])->middleware('auth');
Route::resource('/breweries', 'BreweryController')->only(['show']);

Route::prefix('breweries')->name('breweries.')->group(function () {
    Route::put('/{brewery}/like', 'BreweryController@like')->name('like')->middleware('auth');
    Route::delete('/{brewery}/like', 'BreweryController@unlike')->name('unlike')->middleware('auth');
});

Route::get('/tags/{name}', 'TagController@show')->name('tags.show');

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', 'UserController@show')->name('show');
});