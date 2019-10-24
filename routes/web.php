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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'HomeController@index');

Route::resource('regions', 'RegionsController');
Route::resource('places', 'PlacesController');
Route::resource('districts', 'DistrictsController');

Route::post('regions/massDelete', [
    'as'   => 'regions.massDelete',
    'uses' => 'RegionsController@massDelete'
]);
Route::post('places/massDelete', [
    'as'   => 'places.massDelete',
    'uses' => 'PlacesController@massDelete'
]);
Route::post('districts/massDelete', [
    'as'   => 'districts.massDelete',
    'uses' => 'DistrictsController@massDelete'
]);