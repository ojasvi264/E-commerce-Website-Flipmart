<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//return normal text content
Route::get('/welcome', function () {
    return view('welcome');
});


//call view file
Route::get('/', function () {
    return view('welcome');
});


//return normal text content with parameter
Route::get('/welcome/{users}', function ($user) {
    return 'welcome  '.$user;
});
