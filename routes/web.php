<?php

Auth::routes();

Route::any('{all}', function () {
    return view('front.index');
})->where(['all' => '.*']);
