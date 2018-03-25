<?php

Auth::routes();

Route::group([
    'namespace' => 'Api',
    'middleware' => 'auth',
    'prefix' => 'api'
], function () {
    Route::get('profile/{id}', 'MyProfileController@show');
    Route::patch('profile/{id}', 'MyProfileController@update');
});

Route::any('{all}', function () {
    return view('front.index');
})->where(['all' => '.*']);
