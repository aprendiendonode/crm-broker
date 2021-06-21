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

//Route::middleware(['checkauth'])->group(function () {
//});
    Route::group(['as' => 'activity.', 'prefix' => 'activity', 'middleware' => ['checkauth','lang']],function() {
//        Route::get('/', 'ActivityController@index');


        Route::middleware(['authority'])->group(function () {

            //tasks
            Route::get('/tasks/{agency}','TaskController@index');
            Route::get('/tasks/{agency}/up_coming','TaskController@index');
            Route::get('/tasks/{agency}/completed','TaskController@index');
            Route::get('/tasks/{agency}/show/{id}','TaskController@show');


            // notes

            Route::get('/notes/{agency}/listings','NoteController@index');
            Route::get('/notes/{agency}/leads','NoteController@index');
            Route::get('/notes/{agency}/clients','NoteController@index');
            Route::get('/notes/{agency}/tasks','NoteController@index');
            Route::get('/notes/{agency}/opportunities','NoteController@index');


            // emails
            Route::get('/emails/{agency}','EmailController@index');

            //activity logs
            Route::get('/activity_logs/{agency}','ActivityLogController@index')->name('activity_logs.index');

        });

        //tasks
        Route::post('/tasks/store','TaskController@store')->name('tasks.store');
        Route::post('tasks/update_status', 'TaskController@update_status');
        Route::post('tasks/add_note', 'TaskController@add_note')->name('tasks.add_note');
        Route::put('tasks/update/{task}', 'TaskController@update')->name('tasks.update');
        Route::delete('tasks/delete/{task}', 'TaskController@destroy')->name('tasks.delete');


        // emails
        Route::post('/emails/store','EmailController@store')->name('emails.store');

    });

