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

Route::prefix('setting')->group(function () {
    Route::get('/', 'SettingController@index');
});


Route::middleware(['checkauth','lang'])->group(function () {

    Route::group(['as' => 'setting.', 'prefix' => 'setting'], function () {


        ///////////////////////PROFILE///////////////////////////////////////
//    Route::resource('profiles','ProfilesController')->only([
//        'edit', 'update'
//    ]);
        Route::get('profiles/edit/{id}/{agency}', 'ProfilesController@edit')->name('profiles.edit');
        Route::put('profiles/update/{id}', 'ProfilesController@update')->name('profiles.update');
        Route::get('profiles/change_password', 'ProfilesController@change_password_view')->name('profiles.change_password_view');
        Route::post('profiles/change_password', 'ProfilesController@change_password_process')->name('profiles.change_password_process');
        ///////////////////END PROFILE///////////////////////////////////////

        ///////////////////////TEMPLATE///////////////////////////////////////
        Route::get('templates/{agency}','TemplatesController@index')->name('templates.index');
        Route::post('templates/store','TemplatesController@store')->name('templates.store');
        Route::patch('templates/update/{id}','TemplatesController@update')->name('templates.update');
        Route::get('templates/{agency}/filter/{type}','TemplatesController@filter')->name('templates.filter');
        Route::post('templates/delete','TemplatesController@destroy')->name('templates.delete');
        ///////////////////END TEMPLATE///////////////////////////////////////




        ///////////////////////EMAIL NOTIFY///////////////////////////////////////

        Route::get('emailnotify/edit/{id}/{agency}', 'EmailNotifiesController@edit')->name('emailnotify.edit');
        Route::put('emailnotify/update/{id}', 'EmailNotifiesController@update')->name('emailnotify.update');
        ///////////////////END EMAIL NOTIFY///////////////////////////////////////


        ///////////////////////MailList///////////////////////////////////////
        Route::get('maillists/{agency}','MailListsController@index')->name('maillists.index');
        Route::post('maillists/store','MailListsController@store')->name('maillists.store');
        Route::patch('maillists/update/{id}','MailListsController@update')->name('maillists.update');
        Route::get('maillists/{agency}/filter/{type}','MailListsController@filter')->name('maillists.filter');
        Route::post('maillists/delete','MailListsController@destroy')->name('maillists.delete');
        ///////////////////END MailList///////////////////////////////////////




        ///////////////////////ImageBanks///////////////////////////////////////
        Route::get('image_banks/{agency}','ImageBanksController@index')->name('image_banks.index');
        Route::post('image_banks/store','ImageBanksController@store')->name('image_banks.store');
        Route::post('image_banks/store/image','ImageBanksController@store_image')->name('image_banks.store.image');
        Route::get('image_banks/delete/image/{id}','ImageBanksController@delete_image')->name('image_banks.delete.image');
        Route::post('image_banks/store/folder','ImageBanksController@store_folder')->name('image_banks.store.folder');
        Route::post('image_banks/store/rename_folder','ImageBanksController@rename_folder')->name('image_banks.store.folder.name');
        Route::get('image_banks/delete_folder/{id}','ImageBanksController@delete_folder')->name('image_banks.store.folder.delete');
        Route::get('image_banks/store/get_content/{agency}','ImageBanksController@content');
        Route::get('image_banks/store/get_content/{agency}/{folder}','ImageBanksController@folder_content');
        Route::patch('image_banks/update/{id}','ImageBanksController@update')->name('image_banks.update');
        Route::get('image_banks/{agency}/filter/{type}','ImageBanksController@filter')->name('image_banks.filter');
        Route::post('image_banks/delete','ImageBanksController@destroy')->name('image_banks.delete');
        Route::get('image_banks/open_folder/{agency}/{folder}','ImageBanksController@open_folder')->name('image_banks.open_folder');
        ///////////////////END ImageBanks///////////////////////////////////////





        ///////////////////////FLOORPLAN///////////////////////////////////////
        Route::get('floor_plans/{agency}','FloorplansController@index')->name('floor_plans.index');
        Route::post('floor_plans/store','FloorplansController@store')->name('floor_plans.store');
        Route::post('floor_plans/store/image','FloorplansController@store_image')->name('floor_plans.store.image');
        Route::get('floor_plans/delete/image/{id}/{agency}','FloorplansController@delete_image')->name('floor_plans.delete.image');
        Route::get('floor_plans/store/get_content/{agency}','FloorplansController@content');
        ///////////////////END FLOORPLAN///////////////////////////////////////



        ///////////////////////TASKS///////////////////////////////////////
        Route::get('task_types/{agency}','TaskTypeController@index')->name('task_types.index');
        Route::post('task_types/store','TaskTypeController@store')->name('task_types.store');
        Route::patch('task_types/update/{id}','TaskTypeController@update')->name('task_types.update');
        Route::delete('task_types/delete/{task_type}','TaskTypeController@destroy')->name('task_types.delete');


        Route::get('task_status/{agency}','TaskStatusController@index')->name('task_status.index');
        Route::post('task_status/store','TaskStatusController@store')->name('task_status.store');
        Route::patch('task_status/update/{id}','TaskStatusController@update')->name('task_status.update');
        Route::delete('task_status/delete/{task_status}','TaskStatusController@destroy')->name('task_status.delete');

        ///////////////////END TASKS///////////////////////////////////////






    });

});
