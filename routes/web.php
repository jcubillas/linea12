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

//Branches
Route::get('/branch','BranchController@getAll');
Route::get('/branch/{id}','BranchController@byId');
Route::post('/branch','BranchController@save');
Route::put('/branch/{id}','BranchController@update');
Route::delete('/branch/{id}','BranchController@delete');