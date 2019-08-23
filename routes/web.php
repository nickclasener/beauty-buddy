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
Route::get('register', 'Auth\LoginController@showLoginForm');
Route::get('/', 'Auth\LoginController@showLoginForm');

Route::group([ 'middleware' => 'auth' ], function () {
	Route::get('klanten/search', 'CustomerSearchController@index')->name('customer.search');
	Route::get('klanten/nieuw', 'CustomerController@create')->name('customer.create');
	Route::get('klanten', 'CustomerController@index')->name('customer.index');
	Route::post('klanten', 'CustomerController@store')->name('customer.store');
	Route::delete('klanten/{customer}', 'CustomerController@destroy')->name('customer.destroy');
	Route::get('klanten/{customer}', 'CustomerController@show')->name('customer.show');
	Route::get('klanten/{customer}/bewerken', 'CustomerController@edit')->name('customer.edit');
	Route::match([
			'PATCH',
			'PUT',
	], 'klanten/{customer}', 'CustomerController@update')->name('customer.update');

	// Note Routes
	Route::get('klanten/{customer}/notities/search', 'NoteSearchController@index')->name('note.search');
	Route::delete('notities/{note}', 'NoteController@destroy')->name('note.destroy');
	Route::get('klanten/{customer}/notities/nieuw', 'NoteController@create')->name('note.create');
	Route::get('klanten/{customer}/notities', 'NoteController@index')->name('note.index');
	Route::get('klanten/{customer}/notities/{note}', 'NoteController@show')->name('note.show');
	Route::get('klanten/{customer}/notities/{note}/bewerken', 'NoteController@edit')->name('note.edit');
	Route::post('klanten/{customer}/notities', 'NoteController@store')->name('note.store');
	Route::match([
			'put',
			'patch',
	], '/notities/{note}', 'NoteController@update')->name('note.update');

	// Huidanalyses Routes
	Route::get('klanten/{customer}/huidanalyses/search', 'HuidanalyseSearchController@index')
	     ->name('huidanalyse.search');
	Route::get('klanten/{customer}/huidanalyses/{huidanalyse}', 'HuidanalyseController@show')
	     ->name('huidanalyse.show');
	Route::get('klanten/{customer}/huidanalyses', 'HuidanalyseController@index')->name('huidanalyse.index');
	Route::delete('huidanalyses/{huidanalyse}', 'HuidanalyseController@destroy')->name('huidanalyse.destroy');
	Route::get('klanten/{customer}/huidanalyses/{huidanalyse}/bewerken', 'HuidanalyseController@edit')
	     ->name('huidanalyse.edit');
	Route::post('klanten/{customer}/huidanalyses', 'HuidanalyseController@store')->name('huidanalyse.store');
	Route::match([
			'put',
			'patch',
	], '/huidanalyses/{huidanalyse}', 'HuidanalyseController@update')->name('huidanalyse.update');

	// DailyAdvice Routes
	Route::get('klanten/{customer}/dagelijks-advies/search', 'DailyAdviceSearchController@index')->name('dailyadvice.search');
	//	Route::get('klanten/{customer}/dagelijks-advies/nieuw', 'DailyAdviceController@create')->name('dailyadvice.create');
	Route::get('klanten/{customer}/dagelijks-advies/{dailyAdvice}', 'DailyAdviceController@show')
	     ->name('dailyadvice.show');
	Route::get('klanten/{customer}/dagelijks-advies', 'DailyAdviceController@index')->name('dailyadvice.index');
	Route::delete('dagelijks-advies/{dailyAdvice}', 'DailyAdviceController@destroy')->name('dailyadvice.destroy');
	Route::post('klanten/{customer}/dagelijks-advies', 'DailyAdviceController@store')->name('dailyadvice.store');
	Route::get('klanten/{customer}/dagelijks-advies/{dailyAdvice}/bewerken', 'DailyAdviceController@edit')
	     ->name('dailyadvice.edit');
	Route::match([
			'put',
			'patch',
	], 'dagelijks-advies/{dailyAdvice}', 'DailyAdviceController@update')->name('dailyadvice.update');

	// Intake Routes
	Route::get('klanten/{customer}/intake/nieuw', 'IntakeController@create')->name('intake.create');
	Route::get('klanten/{customer}/intake', 'IntakeController@show')->name('intake.show');
	Route::post('klanten/{customer}/intake', 'IntakeController@store')->name('intake.store');
	Route::delete('klanten/{customer}/intake', 'IntakeController@destroy')->name('intake.destroy');
	Route::get('klanten/{customer}/intake/bewerken', 'IntakeController@edit')->name('intake.edit');
	Route::match([
			'put',
			'patch',
	], 'klanten/{customer}/intake', 'IntakeController@update')->name('intake.update');
});
