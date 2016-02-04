<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//PAGES
Route::get('/', 'PagesController@index');
Route::group(['prefix' => 'menu'], function () {
    Route::get('/', 'PagesController@menu');
    Route::get('{url}', 'MenuController@single');
});

Route::get('emails/test', 'EmailController@sendContact');

Route::get('locations', 'PagesController@locator');
Route::get('story', 'PagesController@story');
Route::get('franchise', 'PagesController@franchise');
Route::get('online-order', 'PagesController@order');
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');
Route::get('careers', 'PagesController@careers');
Route::get('legal', 'PagesController@legal');
Route::get('cafe-club', 'PagesController@cafeclub');
Route::get('output-locations', 'LocationController@ajax');
Route::get('filter-locations/{lat1}/{lng1}', 'LocationController@filter');
Route::get('filter-order-locations/{lat1}/{lng1}', 'LocationController@orderFilter');

//Snippets
Route::get('snippet/menu-items', 'SnippetController@outputMenuItems');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
