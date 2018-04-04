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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([ 'middleware' => 'auth' ], function () {
	Route::resource('/klanten', 'CustomersController', [
		'parameters' => [ 'klanten' => 'customer', ],
	]);
//	Route::get('/data/klanten', 'CustomersController@dataIndex');
//])->middleware('auth');

	Route::resource('/klanten/{customer}/notes', 'NotesController');

	Route::prefix('data')->namespace('Data')->group(function () {
		Route::resource('/klanten', 'CustomersController', [
			'parameters' => [ 'klanten' => 'customer', ],
		]);
//	])->middleware('auth');
	});
});
