<?php

Auth::routes();

Route::get('/privacy-policy', 'HomeController@privacy_policy')->name('privacy_policy');
Route::get('/terms-of-use', 'HomeController@terms_of_use')->name('terms_of_use');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'EventsController@index')->name('home');
    Route::get('/home', 'EventsController@index')->name('home');
    Route::get('/dashboard', 'EventsController@index')->name('dashboard');

    Route::group(['prefix' => 'my_account'], function() {
        Route::get('/', 'MyAccountController@edit_profile')->name('my_account');
        Route::put('/', 'MyAccountController@update_profile')->name('my_account.update');
        Route::put('/change_password', 'MyAccountController@change_pass')->name('my_account.change_pass');
    });


    Route::resource('events', 'EventsController');
    Route::group([
        'prefix' => 'events',
        'middleware' => 'teamSAT'
    ], function() {
        Route::resource('participant', 'Event\ParticipantController');
    });

    /*************** Support Team *****************/
    Route::group(['namespace' => 'SupportTeam',], function(){
        /*************** Users *****************/
        Route::group(['prefix' => 'users'], function(){
            Route::get('reset_pass/{id}', 'UserController@reset_pass')->name('users.reset_pass');
        });

        Route::resource('students', 'StudentRecordController');
        Route::resource('users', 'UserController');
        Route::resource('classes', 'MyClassController');
        Route::resource('subjects', 'SubjectController');
    });
});

/************************ SUPER ADMIN ****************************/
Route::group(['namespace' => 'SuperAdmin','middleware' => 'super_admin', 'prefix' => 'super_admin'], function(){
    Route::get('/settings', 'SettingController@index')->name('settings');
    Route::put('/settings', 'SettingController@update')->name('settings.update');

});

/************************ PARENT ****************************/
Route::group(['namespace' => 'MyParent','middleware' => 'my_parent',], function(){
    Route::get('/my_children', 'MyController@children')->name('my_children');
});
