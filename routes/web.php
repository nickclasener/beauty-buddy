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


Auth::routes();


Route::group(['middleware' => 'auth'], function () {
	Route::get('/', function () {
		return view('welcome');
	});
	
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('/klanten', 'CustomersController', [
					'parameters' => ['klanten' => 'customer',],
	]);
	Route::resource('/klanten/{customer}/notities', 'NotesController', [
					'parameters' => ['notities' => 'notes'],
					'except'     => ['update', 'destroy'],
	]);
	
	Route::delete('/notities/{note}', 'NotesController@destroy', [
					'parameters' => ['notities' => 'notes'],
	])->name('notities.destroy');
	Route::match(['put', 'patch'], '/notities/{note}', 'NotesController@update', [
					'parameters' => ['notities' => 'notes'],
	])->name('notities.update');
});
