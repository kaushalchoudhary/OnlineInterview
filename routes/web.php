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

Route::get('/', "AddressBookController@index");

Route::match(["get", "post"], "create", "AddressBookController@create");
Route::match(["get", "post"], "edit/{id}", "AddressBookController@update");
Route::match(["get"], "delete/{id}", "AddressBookController@deleteData");
Route::post('/checkemail',['uses'=>'AddressBookController@checkEmail']);