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
        Route::get('home', 'SuperAdminController@home');
        Route::resource('countries', 'CountryController');
        Route::resource('cities', 'CityController');
        Route::resource('communities', 'CommunityController');
        Route::resource('sub-communities', 'SubCommunityController');

        Route::get('listing-type', 'ListingTypeController@index');

        Route::post('manage-listing-type', 'ListingTypeController@store');
        // Route::post('lead_source_from_leads', 'ListingTypeController@add_lead_source');
        Route::patch('manage-listing-type/{type_id}', 'ListingTypeController@update');
        Route::post('delete-listing-type', 'ListingTypeController@destroy');
        Route::resource('permissions-group', 'PermissionsGroupController');
        Route::resource('permissions', 'PermissionsController');
    });
});