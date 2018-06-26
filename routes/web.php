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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/branch', function () {
    return view('branch');
})->middleware('auth');

Route::get('/stop', function () {
    return view('stop');
})->middleware('auth');

//Branches
Route::get('api/branch','BranchController@getAll')->middleware('auth');
Route::get('api/branch/{id}','BranchController@byId')->middleware('auth');
Route::post('api/branch','BranchController@save')->middleware('auth');
Route::put('api/branch/{id}','BranchController@update')->middleware('auth');
Route::delete('api/branch/{id}','BranchController@delete')->middleware('auth');

//Stops
Route::get('api/stop','StopController@getAll')->middleware('auth');
Route::get('api/stop/{id}','StopController@byId')->middleware('auth');
Route::post('api/stop','StopController@save')->middleware('auth');
Route::put('api/stop/{id}','StopController@update')->middleware('auth');
Route::delete('api/stop/{id}','StopController@delete')->middleware('auth');
Auth::routes();

//Home
Route::get('/routes','BranchController@getAll');
Route::get('/routes/{id}','BranchController@byId');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
