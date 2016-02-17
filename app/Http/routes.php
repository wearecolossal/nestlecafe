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
use Illuminate\Support\Facades\Auth;

Route::get('/', 'PagesController@index');


Route::group(['prefix' => 'menu'], function () {
    Route::get('/', 'PagesController@menu');
    Route::get('{url}', 'MenuController@single');
});
Route::get('check-is-logged-in', function(){
   if(Auth::guest()) {
       return 'no';
   }
    return 'yes';
});
Route::get('emails/test', 'EmailController@sendContact');
//Mailer
Route::post('mailer', 'EmailController@sendContact');
Route::get('locations', 'PagesController@locator');
Route::get('story', 'PagesController@story');
Route::get('franchise', 'PagesController@franchise');
Route::get('online-order', 'PagesController@order');
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');
Route::post('contact', 'EmailController@sendContact');
Route::get('contact/success', function(){ return view('pages.contact-thank'); });
Route::get('careers', 'PagesController@careers');
Route::get('legal', 'PagesController@legal');
Route::get('signup', function(){ return redirect('cafe-club'); });
Route::get('cafe-club', 'PagesController@cafeclub');
Route::get('output-locations', 'LocationController@ajax');
Route::get('filter-locations/{lat1}/{lng1}', 'LocationController@filter');
Route::get('filter-order-locations/{lat1}/{lng1}', 'LocationController@orderFilter');

//ADMIN
Route::group(['middleware' => 'web'], function(){
    Route::get('login', 'LoginController@index');
    Route::post('login', 'LoginController@login');
    Route::get('logout', function(){ Auth::logout(); return redirect('/'); });
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
        Route::get('blog', 'Admin\PagesController@blog');
        Route::get('admins', 'Admin\PagesController@admins');
        Route::resource('menu/categories', 'Admin\MenuCategoryController');
        Route::resource('menu', 'Admin\MenuController');
        Route::get('cafes/{id}/archive', 'Admin\CafeController@archive');
        Route::get('cafes/geolocate', 'Admin\CafeController@geolocate');
        Route::post('cafes/{id}/update-services', ['as' => 'cafe.update-services', 'uses' => 'Admin\CafeController@updateServices']);
        Route::post('cafes/{id}/update-hours', ['as' => 'cafe.update-hours', 'uses' => 'Admin\CafeController@updateHours']);
        Route::get('cafes/archives', 'Admin\CafeController@archived');
        Route::resource('cafes', 'Admin\CafeController');
        Route::get('/', 'Admin\PagesController@index');
    });
});


//SANDBOX
Route::get('view-mailer', function(){ return view('emails.contact'); });
//Snippets
Route::get('snippet/menu-items', 'SnippetController@outputMenuItems');
Route::get('snippet/clean-store-image-urls', 'SnippetController@cleanImageUrl');
Route::get('snippet/fill-cafe-services', 'SnippetController@fillServiceColumns');
//301s
Route::get('{page}/{sub?}/{tert?}', 'RedirectController@index');

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

