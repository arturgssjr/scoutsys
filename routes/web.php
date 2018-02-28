<?php

Auth::routes();

Route::group(['prefix' => '', 'as' => 'home'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
});

Route::resource('user', 'UsersController');
Route::resource('category', 'CategoriesController');
Route::resource('team', 'TeamsController');

Route::resource('status', 'StatusesController');
Route::resource('detail', 'DetailsController');

