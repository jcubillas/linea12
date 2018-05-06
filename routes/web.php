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
    return view('index');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/branchsection', function () {
    return view('branch');
})->middleware('auth');

Route::get('/stopsection', function () {
    return view('stop');
})->middleware('auth');

//Branches
Route::get('/branch','BranchController@getAll')->middleware('auth');
Route::get('/branch/{id}','BranchController@byId')->middleware('auth');
Route::post('/branch','BranchController@save')->middleware('auth');
Route::put('/branch/{id}','BranchController@update')->middleware('auth');
Route::delete('/branch/{id}','BranchController@delete')->middleware('auth');

//Stops
Route::get('/stop','StopController@getAll')->middleware('auth');
Route::get('/stop/{id}','StopController@byId')->middleware('auth');
Route::post('/stop','StopController@save')->middleware('auth');
Route::put('/stop/{id}','StopController@update')->middleware('auth');
Route::delete('/stop/{id}','StopController@delete')->middleware('auth');
Auth::routes();

//Index
Route::get('/routes','BranchController@getAll');
Route::get('/routes/{id}','BranchController@byId');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
