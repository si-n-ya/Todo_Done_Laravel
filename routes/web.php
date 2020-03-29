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

Route::get('/', 'TodosController@index');
Route::get('/todo_done/index', 'TodosController@todo_done');
Route::post('/todo_done/create/{id?}', 'TodosController@create');
Route::get('/todo_done/edit/{id?}', 'TodosController@edit');
Route::post('/todo_done/update/{id?}', 'TodosController@update');
Route::post('/todo_done/ajax', 'TodosController@ajax');
Route::get('/todo_done/delete', 'TodosController@delete');

Route::get('/todo_done/done', 'DonesController@index');
Route::post('/todo_done/done/create/{id}', 'DonesController@create');
Route::get('/todo_done/done/edit', 'DonesController@edit');
Route::post('/todo_done/done/update', 'DonesController@update');
Route::get('/todo_done/done/delete', 'DonesController@delete');

Route::get('/todo_done/memo', 'MemosController@index');
Route::post('/todo_done/memo/{id}', 'MemosController@create');
Route::get('/todo_done/memo/edit/{id}', 'MemosController@edit');
Route::post('/todo_done/memo/update/{id}', 'MemosController@update');
Route::get('/todo_done/memo/delete', 'MemosController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');