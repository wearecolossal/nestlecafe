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
Route::get('locations', 'PagesController@locator');
Route::get('story', 'PagesController@story');
Route::get('franchise', 'PagesController@franchise');
Route::get('online-order', 'PagesController@order');
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');
Route::get('careers', 'PagesController@careers');
Route::get('legal', 'PagesController@legal');
Route::get('cafe-club', 'PagesController@cafeclub');

Route::get('output-locations', function(){
    $outputs = \App\Cafe::orderby('lat', 'asc')->get();
    $locations = array();
    foreach($outputs as $output) {
        if(strlen($output->image) < 1) {
            $image = '';
        } else {
            $image = \Illuminate\Support\Facades\URL::asset('uploads/store_images/'.$output->image);
        }
        array_push($locations, [
            'title' => $output->name,
            'lat' => $output->lat,
            'lng' => $output->lng,
            'directions' => $output->maps_url,
            'thumbnail' => $image
        ]);
    }
    return $locations;
});
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
