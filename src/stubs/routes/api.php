<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::middleware('auth:api')->group(function() {

    Route::post('/md5', 'Md5Controller@index');

});
