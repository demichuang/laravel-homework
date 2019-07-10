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

Route::get('/notice', 'NoticeController@index');
Route::get('/notice/create', 'NoticeController@create');
Route::post('/notice', 'NoticeController@store');
Route::get('/notice/{id}/edit', 'NoticeController@edit');
Route::put('/notice/{id}', 'NoticeController@update');
Route::delete('/notice/{id}', 'NoticeController@destroy');
