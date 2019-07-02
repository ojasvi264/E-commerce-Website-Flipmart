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

Route::get('/dashboard', function () {
    return view('layouts.backend');
});


//return normal text content with parameter
Route::get('/welcome/{users}', function ($user) {
    return 'welcome  '.$user;
});

Route::prefix('backend')->middleware('auth')->middleware('CheckPermission')->namespace('Backend')->group(function() {
//index
    Route::get('category', 'CategoryController@index')->name('category.index');
//create form
    Route::get('category/create', 'CategoryController@create')->name('category.create');
//Store into database
    Route::post('category', 'CategoryController@store')->name('category.store');
//view details
    Route::get('category/{id}', 'CategoryController@show')->name('category.show');
//edit form
    Route::get('category/{id}/edit', 'CategoryController@edit')->name('category.edit');
//update into database
    Route::put('category/{id}', 'CategoryController@update')->name('category.update');
//delete from database
    Route::delete('category/{id}', 'CategoryController@destroy')->name('category.destroy');

//index
    Route::get('tag', 'TagController@index')->name('tag.index');
//create form
    Route::get('tag/create', 'TagController@create')->name('tag.create');
//Store into database
    Route::post('tag', 'TagController@store')->name('tag.store');
//view details
    Route::get('tag/{id}', 'TagController@show')->name('tag.show');
//edit form
    Route::get('tag/{id}/edit', 'TagController@edit')->name('tag.edit');
//update into database
    Route::put('tag/{id}', 'TagController@update')->name('tag.update');
//delete from database
    Route::delete('tag/{id}', 'TagController@destroy')->name('tag.destroy');


//index
    Route::get('subcategory', 'SubCategoryController@index')->name('subcategory.index');
//create form
    Route::get('subcategory/create', 'SubCategoryController@create')->name('subcategory.create');
//Store into database
    Route::post('subcategory', 'SubCategoryController@store')->name('subcategory.store');
//view details
    Route::get('subcategory/{id}', 'SubCategoryController@show')->name('subcategory.show');
//edit form
    Route::get('subcategory/{id}/edit', 'SubCategoryController@edit')->name('subcategory.edit');
//update into database
    Route::put('subcategory/{id}', 'SubCategoryController@update')->name('subcategory.update');
//delete from database
    Route::delete('subcategory/{id}', 'SubCategoryController@destroy')->name('subcategory.destroy');



//index
    Route::get('product', 'ProductController@index')->name('product.index');
//create form
    Route::get('product/create', 'ProductController@create')->name('product.create');
//Store into database
    Route::post('product', 'ProductController@store')->name('product.store');
//view details
    Route::get('product/{id}', 'ProductController@show')->name('product.show');
//edit form
    Route::get('product/{id}/edit', 'ProductController@edit')->name('product.edit');
//update into database
    Route::put('product/{id}', 'ProductController@update')->name('product.update');
//delete from database
    Route::delete('product/{id}', 'ProductController@destroy')->name('product.destroy');


    //index
    Route::get('slider', 'SliderController@index')->name('slider.index');
//create form
    Route::get('slider/create', 'SliderController@create')->name('slider.create');
//Store into database
    Route::post('slider', 'SliderController@store')->name('slider.store');
//view details
    Route::get('slider/{id}', 'SliderController@show')->name('slider.show');
//edit form
    Route::get('slider/{id}/edit', 'SliderController@edit')->name('slider.edit');
//update into database
    Route::put('slider/{id}', 'SliderController@update')->name('slider.update');
//delete from database
    Route::delete('slider/{id}', 'SliderController@destroy')->name('slider.destroy');


    //index
    Route::get('role', 'RoleController@index')->name('role.index');
//create form
    Route::get('role/create', 'RoleController@create')->name('role.create');
//Store into database
    Route::post('role', 'RoleController@store')->name('role.store');
//view details
    Route::get('role/{id}', 'RoleController@show')->name('role.show');
//edit form
    Route::get('role/{id}/edit', 'RoleController@edit')->name('role.edit');
//update into database
    Route::put('role/{id}', 'RoleController@update')->name('role.update');
//delete from database
    Route::delete('role/{id}', 'RoleController@destroy')->name('role.destroy');

    //index
    Route::get('module', 'ModuleController@index')->name('module.index');
//create form
    Route::get('module/create', 'ModuleController@create')->name('module.create');
//Store into database
    Route::post('module', 'ModuleController@store')->name('module.store');
//view details
    Route::get('module/{id}', 'ModuleController@show')->name('module.show');
//edit form
    Route::get('module/{id}/edit', 'ModuleController@edit')->name('module.edit');
//update into database
    Route::put('module/{id}', 'ModuleController@update')->name('module.update');
//delete from database
    Route::delete('module/{id}', 'ModuleController@destroy')->name('module.destroy');


    //index
    Route::get('permission', 'PermissionController@index')->name('permission.index');
//create form
    Route::get('permission/create', 'PermissionController@create')->name('permission.create');
//Store into database
    Route::post('permission', 'PermissionController@store')->name('permission.store');
//view details
    Route::get('permission/{id}', 'PermissionController@show')->name('permission.show');
//edit form
    Route::get('permission/{id}/edit', 'PermissionController@edit')->name('permission.edit');
//update into database
    Route::put('permission/{id}', 'PermissionController@update')->name('permission.update');
//delete from database
    Route::delete('permission/{id}', 'PermissionController@destroy')->name('permission.destroy');

//get subcategory
    Route::post('category/subcategory','CategoryController@subcategory')->name('category.subcategory');

    //edit form
    Route::get('attribute/{id}/edit', 'AttributeController@edit')->name('attribute.edit');
    Route::delete('attribute/{id}', 'AttributeController@destroy')->name('attribute.destroy');


    Route::get('role/assignpermission/{id}', 'RoleController@assignPermission')->name('role.assignpermission');
    Route::post('role/savepermission/{id}', 'RoleController@savePermission')->name('role.savepermission');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
