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
Route::middleware(['checkauth', 'authority'])->group(function () {

    Route::prefix('agency')->group(function () {


        // manage staff routes
        Route::get('staff/{agency}', 'StaffController@index');
        Route::get('staff/{agency}/privileges/{staff}', 'StaffController@privileges');
        Route::get('export/{agency}', 'StaffController@export');

        // team routes

        Route::get('teams/{agency}', 'TeamController@index');
        Route::get('team/export/{agency}', 'TeamController@export');

        // company profile

        Route::get('profile/{agency}', 'CompanyProfileController@index');
        Route::get('settings/{agency}', 'SettingsController@index');
    });
});

Route::middleware(['checkauth'])->group(function () {


    Route::prefix('agency')->group(function () {

        //staff

        Route::post('manage_staff', 'StaffController@store');
        Route::patch('manage_staff/{staff_id}', 'StaffController@update');
        Route::post('update_privileges', 'StaffController@update_privileges');
        Route::post('changepassword', 'StaffController@change_password');
        Route::post('deleteuser', 'StaffController@destroy');
        Route::post('make-moderator', 'StaffController@moderator');


        //team


        Route::post('manage_team', 'TeamController@store');
        Route::patch('manage_team/{team_id}', 'TeamController@update');
        Route::post('deleteteam', 'TeamController@destroy');
        Route::post('teams/add-member', 'TeamController@add_member');


        //company profile
        Route::put('profile/update/{id}', 'CompanyProfileController@update')->name('agency.profile.update');

        // company settings

        Route::post('update-settings', 'SettingsController@update');



        // watermark settings
        Route::get('watermark/{agency}', 'SettingsController@watermark_edit');
        Route::post('watermark', 'SettingsController@watermark_process');
    });
});