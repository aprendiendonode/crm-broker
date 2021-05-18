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


Route::middleware(['checkauth', 'lang'])->group(function () {

    Route::prefix('superadmin')->group(function () {
        Route::resource('countries', 'CountryController');
        Route::resource('cities', 'CityController');
        Route::resource('communities', 'CommunityController');
        Route::resource('sub-communities', 'SubCommunityController');
    });
});
