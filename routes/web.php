<?php

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user', 'UsersController');
Route::resource('category', 'CategoriesController');
Route::resource('team', 'TeamsController');
