<?php

use Mango\Route;

Route::get("/", "MainController@index");
Route::get("/home", "HomeController@index");
Route::get("/login", "LoginController@login");
Route::get("/logout", "LoginController@logout");
Route::get("/register", "LoginController@register");
Route::get("/list", "PostController@list");
Route::get("/view", "PostController@view");
Route::get("/write", "PostController@write");
Route::get("/like", "PostController@like");
Route::get("/unlike", "PostController@unlike");
Route::get("/save", "PostController@save");
Route::get("/unsave", "PostController@unsave");
Route::get("/user", "ProfileController@index");
Route::get("/search", "PostController@search");

Route::post("/register/check", "LoginController@regicheck");
Route::post("/login/check", "LoginController@logcheck");
Route::post("/write/check", "PostController@writecheck");
Route::post("/write/comment", "PostController@comment");