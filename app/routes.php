<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('Chello');
});*/

Route::get('/','CatalogController@showCatalog');
Route::get('home','CatalogController@showCatalog');

Route::get('catalog','CatalogController@showCatalog');
Route::get('catalog/{sub_category}','CatalogController@showCatalog');
Route::get('catalog/{sub_category}/{view_type}','CatalogController@showCatalog');
Route::get('catalog/{sub_category}/{view_type}/{sort_by}','CatalogController@showCatalog');
Route::get('catalog/{sub_category}/{view_type}/{sort_by}/{per_page}','CatalogController@showCatalog');
Route::get('catalog/{sub_category}/{view_type}/{sort_by}/{per_page}/{page_no}','CatalogController@showCatalog');
Route::post('catalog/search','CatalogController@postSearch');

Route::get('item/{item_id}','CatalogController@itemDetails');
Route::get('ad/new','PostController@showForm');
Route::post('ad/new','PostController@postForm');

Route::get('users','UsersController@getLogin');
Route::get('users/register','UsersController@getRegister');
Route::post('users/create','UsersController@postCreate');
Route::get('users/login','UsersController@getLogin');
Route::post('users/signin','UsersController@postSignin');
Route::get('users/logout','UsersController@getLogout');

Route::get('users/dashboard','UsersController@getDashboard');
Route::get('users/dashboard/{tag}','UsersController@getDashboard');
Route::get('item/archive/{item_id}','UsersController@archiveItem');
Route::get('item/archive/{item_id}/{reverse}','UsersController@archiveItem');

Route::get('admin/dashboard/','UsersController@getAdminDashboard');
Route::get('admin/dashboard/{tag}','UsersController@getAdminDashboard');
Route::get('admin/dashboard/ban/{uid}','UsersController@banUser');
Route::get('admin/dashboard/ban/{uid}/{reverse}','UsersController@banUser');


