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
        Route::get('export_all/{agency}', 'ListingController@export_all');
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
        Route::post('modify-listing-title', 'ListingController@modify_title')
            ->name('listings.modify-listing-title');
        Route::post('remove-listing-temporary', 'ListingController@remove_listing_temporary')
            ->name('listings.remove-listing-temporary');
        Route::post('update-listing-temporary-active', 'ListingController@update_listing_temporary_active')
            ->name('listings.update-listing-temporary-active');
        Route::patch('update-listing-portals/{listing}', 'ListingController@update_listing_portals')
            ->name('listings.portals');
        Route::post('listing/delete', 'ListingController@destroy')->name('listings.delete');
        Route::patch('manage_listings/assign_task/{listing_id}', 'ListingController@assign_task');
        Route::patch('manage_listings/edit_assign_task/{listing_id}', 'ListingController@edit_assign_task');

        Route::post('delete-listing-tasks', 'ListingController@delete_task');
        Route::post('save-note', 'ListingController@save_note')->name('listings.save_note');
        Route::post('listing-update-status', 'ListingController@listing_update_status')->name('listings.listing-update-status');


        Route::get('share/{agency}', 'ListingController@share_listing')
            ->name('listings.share');
        Route::get('requests/{agency}', 'ListingController@requests')
            ->name('listings.requests');
        Route::post('send_request', 'ListingController@send_request')
            ->name('listings.send_request');
        Route::post('block', 'ListingController@block')
            ->name('listings.block');
        Route::get('request_response/{response}/{id}', 'ListingController@request_response')
            ->name('listings.request_response');
        Route::get('old_requests/{agency}', 'ListingController@old_requests')
            ->name('listings.old_requests');
        Route::get('black_listed/{agency}', 'ListingController@black_listed')
            ->name('listings.black_listed');
        Route::post('unblock', 'ListingController@unblock')
            ->name('listings.unblock');
        Route::post('contact_client', 'ListingController@contact_client')
            ->name('listings.contact_client');
        Route::post('get-communities', 'ListingController@get_communities')
            ->name('listings.get-communities');
        Route::post('get-sub-communities', 'ListingController@get_sub_communities')
            ->name('listings.get-sub-communities');
    });
});
