<?php

use Mango\Route;

Route::get("/", "MainController@index");
Route::get("/home", "HomeController@index");
Route::get("/login", "LoginController@login");
Route::get("/register", "LoginController@register");