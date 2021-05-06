<?php

use Modules\Listing\Entities\TemporaryListing;

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

Route::middleware(['checkauth', 'authority', 'lang'])->group(function () {

    Route::prefix('listing')->group(function () {
        Route::get('controll/{agency}', 'ListingController@index');
        Route::get('listing-view/{agency}', 'ListingViewController@index');

        Route::get('listing-cheque/{agency}', 'ListingChequeController@index');
        Route::get('listing-type/{agency}', 'ListingTypeController@index');


        Route::get('locations/{agency}', 'ListingController@locations');
        Route::get('uploader/{agency}', 'ListingController@uploader');
        Route::get('download-brochure-pdf/{type}/{agency}', 'ListingController@brochure');
    });
});


Route::middleware(['checkauth', 'lang'])->group(function () {

    Route::prefix('listing')->group(function () {
        Route::post('manage-listing-view', 'ListingViewController@store');
        // Route::post('lead_source_from_leads', 'ListingViewController@add_lead_source');
        Route::patch('manage-listing-view/{view_id}', 'ListingViewController@update');
        Route::post('delete-listing-view', 'ListingViewController@destroy');

        Route::post('manage-listing-cheque', 'ListingChequeController@store');
        // Route::post('lead_source_from_leads', 'ListingChequeController@add_lead_source');
        Route::patch('manage-listing-cheque/{cheque_id}', 'ListingChequeController@update');
        Route::post('delete-listing-cheque', 'ListingChequeController@destroy');


        Route::post('manage-listing-type', 'ListingTypeController@store');
        // Route::post('lead_source_from_leads', 'ListingTypeController@add_lead_source');
        Route::patch('manage-listing-type/{type_id}', 'ListingTypeController@update');
        Route::post('delete-listing-type', 'ListingTypeController@destroy');


        Route::post('listing/store', 'ListingController@store')->name('listing.store');
        Route::patch('listing/update/{id}', 'ListingController@update')->name('listing.update');
        Route::post('listing/tenant-from-listing', 'ListingController@tenant')->name('listing.tenant-store');
        Route::post('listing/landlord-from-listing', 'ListingController@landlord')->name('listing.landlord-store');
        Route::post('listing/developer-from-listing', 'ListingController@developer')->name('listing.developer-store');

        Route::post('upload-image', 'ListingController@temporary_photos')->name('listing.temporary-photos');
        Route::post('upload-plans', 'ListingController@temporary_plans')->name('listing.temporary-plans');
        Route::post('upload-documents', 'ListingController@temporary_documents')->name('listing.temporary-documents');
        Route::post('modify-listing-document-title', 'ListingController@modify_document_title')
            ->name('listings.modify-listing-document-title');
        Route::post('remove-listing-temporary-photo', 'ListingController@remove_listing_temporary_photo')
            ->name('listings.remove-listing-temporary-photo');
    });
});