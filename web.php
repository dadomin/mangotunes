<?php

use Mango\Route;

Route::get("/", "MainController@index");
Route::get("/home", "HomeController@index");
Route::get("/login", "LoginController@login");
Route::get("/register", "LoginController@register");
Route::get("/list", "ListController@index");
Route::get("/list/happy", "ListController@happy");
Route::get("/list/sad", "ListController@sad");
Route::get("/list/stressed", "ListController@stressed");
Route::get("/list/relaxed", "ListController@relaxed");
Route::get("/list/mango", "ListController@mango");