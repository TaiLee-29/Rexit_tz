<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');
//Post routs
Route::get('/{id}','\App\Http\Controllers\PostController@show')->name('show')->where('id', '[0-9]+');
Route::get('/post/list','\App\Http\Controllers\PostController@list');
Route::get('/post/create','\App\Http\Controllers\PostController@create');
Route::post('/post/create','\App\Http\Controllers\PostController@store');
Route::get('/post/{id}/update','\App\Http\Controllers\PostController@update')->name('update');;
Route::post('/post/{id}/update','\App\Http\Controllers\PostController@edit')->name('edit');
Route::delete('/post/{id}/delete','\App\Http\Controllers\PostController@destroy')->name('delete');
