<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::middleware('auth:api')->group(function() {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/md5', 'Md5Controller@index');

});
