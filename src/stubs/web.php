<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', function () { return view('welcome'); });

// STUDENT ROUTES
Route::middleware(['auth', 'user.active'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/dashboards/main', 'DashboardController@main')->name('dashboards.main');

});

// ADMIN ROUTES
Route::middleware(['auth', 'auth.admin'])->group(function () {

    Route::resource('roles',    'RoleController');
    Route::resource('tags',     'TagController');
    Route::resource('users',    'UserController');

});

