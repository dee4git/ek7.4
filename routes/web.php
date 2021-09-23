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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/todo_show', 'TodoController@show');
Route::get('/todo_create', 'TodoController@create');
Route::post('/todo_submit', 'TodoController@store');
Route::get('/todo_delete/{id}', 'TodoController@delete');
Route::get('/todo_destroy/{id}', 'TodoController@destroy');
Route::get('/todo_edit/{id}', 'TodoController@edit');
Route::post('/todo_update/{id}', 'TodoController@update')->name('todo_update');
Route::get('/todo_restore/{id}', 'TodoController@restore')->name('todo_restore');
