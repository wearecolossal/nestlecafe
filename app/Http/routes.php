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
Route::get('franchise-2', 'PagesController@newFranchise');
Route::get('order-online', 'PagesController@order');
Route::get('online-order', function(){ return redirect('order-online'); });
Route::get('about', 'PagesController@about');
Route::get('promotions', 'PagesController@promotion');
Route::get('contact', 'PagesController@contact');
Route::post('contact', 'EmailController@sendContact');
Route::get('contact/success', function(){ return view('pages.contact-thank'); });
Route::get('careers', 'PagesController@careers');
Route::get('legal', 'PagesController@legal');
Route::get('signup', function(){ return redirect('cafe-club'); });
Route::get('dadsgiveaway', function(){
   return redirect('uploads/documents/Nestle-Toll-House-Cafe-by-Chip-Dad-Giveaway-Official-Rules.pdf');
});
Route::get('cafe-club', 'PagesController@cafeclub');
Route::get('fundraise', function(){return redirect('funraise');});
Route::get('funraise', 'PagesController@funraise');
Route::get('output-locations', 'LocationController@ajax');
Route::post('location-search', 'LocationController@searchByCountry');
Route::post('location-search-state', 'LocationController@searchByState');
Route::post('location-search-by-country', 'LocationController@listStoresByCountry');
Route::post('location-search-by-city', 'LocationController@listStoresByCity');
Route::get('filter-locations/{lat1}/{lng1}/{miles?}', 'LocationController@filter');
Route::get('filter-order-locations/{lat1}/{lng1}/{miles?}', 'LocationController@orderFilter');

//ADMIN
Route::group(['middleware' => 'web'], function(){
    Route::get('login', 'LoginController@index');
    Route::post('login', 'LoginController@login');
    Route::get('logout', function(){ Auth::logout(); return redirect('/'); });
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
        Route::resource('promotions', 'Admin\PromotionController');
        Route::resource('callouts', 'Admin\CalloutController');
//        Route::get('blog', 'Admin\PagesController@blog');
        Route::get('admins', 'Admin\PagesController@admins');
        Route::get('menu/categories/{id}/archive', 'Admin\MenuCategoryController@archive');
        Route::resource('menu/categories', 'Admin\MenuCategoryController');
        Route::get('menu/archives', 'Admin\MenuController@archived');
        Route::get('menu/{id}/archive', 'Admin\MenuController@archive');
        Route::resource('menu', 'Admin\MenuController');
        Route::get('slides/{id}/archive', 'Admin\SlideController@archive');
        Route::get('slides/archives', 'Admin\SlideController@archived');
        Route::resource('slides', 'Admin\SlideController');
        Route::get('cafes/format/phone-numbers', 'Admin\CafeController@phoneHelper');
        Route::get('cafes/{id}/archive', 'Admin\CafeController@archive');
        Route::get('cafes/geolocate', 'Admin\CafeController@geolocate');
        Route::post('cafes/{id}/update-services', ['as' => 'cafe.update-services', 'uses' => 'Admin\CafeController@updateServices']);
        Route::post('cafes/{id}/update-hours', ['as' => 'cafe.update-hours', 'uses' => 'Admin\CafeController@updateHours']);
        Route::get('cafes/archives', 'Admin\CafeController@archived');
        Route::resource('cafes', 'Admin\CafeController');
        Route::get('/', 'Admin\PagesController@index');
    });
});

//DEV FIXES
Route::get('fix-cafes', function(){
    $cafes = \App\Cafe::all();
    \App\Cafe::where('country', 'like', '%TX%')->update(['country' => 'United States']);
    \App\Cafe::where('country', 'like', '%FL%')->update(['country' => 'United States']);
    \App\Cafe::where('country', 'like', '%USA%')->update(['country' => 'United States of America']);
    \App\Cafe::where('country', 'like', '%Canada%')->update(['country' => 'Canada']);
    \App\Cafe::where('country', 'like', '%CANADA%')->update(['country' => 'Canada']);
    \App\Cafe::where('country', 'like', '%United States%')->update(['country' => 'United States of America']);
    \App\Cafe::where('country', 'like', '')->update(['country' => 'United States of America']);
    \App\Cafe::where('state', 'TX')->update(['state' => 'Texas']);
    \App\Cafe::where('state', 'CA')->update(['state' => 'California']);
    \App\Cafe::where('state', 'FL')->update(['state' => 'Florida']);
    \App\Cafe::where('state', 'MI')->update(['state' => 'Michigan']);
    \App\Cafe::where('state', 'NY')->update(['state' => 'New York']);
    \App\Cafe::where('state', 'IL')->update(['state' => 'Illinois']);
    \App\Cafe::where('state', 'AK')->update(['state' => 'Alaska']);
    \App\Cafe::where('state', 'MD')->update(['state' => 'Maryland']);
    \App\Cafe::where('state', 'VA')->update(['state' => 'Virginia']);
    \App\Cafe::where('state', 'NC')->update(['state' => 'North Carolina']);
    \App\Cafe::where('state', 'PA')->update(['state' => 'Pennsylvania']);
    \App\Cafe::where('state', 'IN')->update(['state' => 'Indiana']);
    \App\Cafe::where('state', 'SC')->update(['state' => 'South Carolina']);
    \App\Cafe::where('state', 'AZ')->update(['state' => 'Arizona']);
    \App\Cafe::where('state', 'CO')->update(['state' => 'Colarado']);
    \App\Cafe::where('state', 'LA')->update(['state' => 'Louisiana']);
    \App\Cafe::where('state', 'NV')->update(['state' => 'Nevada']);
    \App\Cafe::where('state', 'KS')->update(['state' => 'Kansas']);
    \App\Cafe::where('state', 'NM')->update(['state' => 'New Mexico']);
    \App\Cafe::where('state', 'AL')->update(['state' => 'Alabama']);
    \App\Cafe::where('state', 'OK')->update(['state' => 'Oklahoma']);
    \App\Cafe::where('state', 'WA')->update(['state' => 'Washington']);
    \App\Cafe::where('state', 'AR')->update(['state' => 'Arkansas']);
    \App\Cafe::where('state', 'MO')->update(['state' => 'Missouri']);
    \App\Cafe::where('state', 'MN')->update(['state' => 'Minnesota']);
    \App\Cafe::where('state', 'ON')->update(['state' => 'Ontario']);
    \App\Cafe::where('state', 'like', '%GA%')->update(['state' => 'Georgia']);
    \App\Cafe::whereNull('country')->update(['country' => 'United States of America']);
    return 'done';
});
//SANDBOX
Route::get('view-mailer', function(){ return view('emails.contact'); });
//Snippets
Route::get('snippet/menu-items', 'SnippetController@outputMenuItems');
Route::get('snippet/clean-store-image-urls', 'SnippetController@cleanImageUrl');
Route::get('snippet/fill-cafe-services', 'SnippetController@fillServiceColumns');
//301s
Route::get('library/pdf/NutritionFactsGrid.pdf', function(){
   return redirect('uploads/documents/Nestle-Tollhouse-Cafe-by-Chip-Nutrition-Facts.pdf');
});
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

