<?php

use App\Models\Agency;
use App\Models\Business;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('listing')->group(function () {
    Route::get('home', 'Api\ListingController@home');
    Route::get('Listing', 'Api\ListingController@index');
    Route::get('Listing/{type}', 'Api\ListingController@index');
    Route::get('single', 'Api\ListingController@singleListing');
});