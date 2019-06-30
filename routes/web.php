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

//Route::get('/', function () {
//	return view('notes.notes');
//});

Route::group([ 'middleware' => 'auth' ], function () {
	Route::get('klanten/search', 'CustomerSearchController@index')->name('klanten.search');
	Route::get('klanten/nieuw', 'CustomerController@create')->name('klanten.create');
	Route::get('klanten', 'CustomerController@index')->name('klanten.index');
	Route::post('klanten', 'CustomerController@store')->name('klanten.store');
	Route::delete('klanten/{customer}', 'CustomerController@destroy')->name('klanten.destroy');
	Route::get('klanten/{customer}', 'CustomerController@show')->name('klanten.show');
	Route::get('klanten/{customer}/bewerken', 'CustomerController@edit')->name('klanten.edit');
	Route::match([
			'PATCH',
			'PUT',
	], 'klanten/{customer}', 'CustomerController@update')->name('klanten.update');

	// Note Routes
	Route::get('klanten/{customer}/notities/search', 'NoteSearchController@index')->name('notes.search');
	Route::delete('notities/{note}', 'NoteController@destroy')->name('notes.destroy');
	Route::get('klanten/{customer}/notities/nieuw', 'NoteController@create')->name('notes.create');
	//	Route::get('klanten/{customer}/notities', 'NoteController@show')->name('notes.show');
	Route::get('klanten/{customer}/notities', 'NoteController@index')->name('notes.index');
	Route::get('klanten/{customer}/notities/{notes}', 'NoteController@show')->name('notes.show');
	Route::get('klanten/{customer}/notities/{notes}/bewerken', 'NoteController@edit')->name('notes.edit');
	Route::post('klanten/{customer}/notities', 'NoteController@store')->name('notes.store');
	Route::match([
			'put',
			'patch',
	], '/notities/{note}', 'NoteController@update')->name('notes.update');

	// Huidanalyses Routes
	Route::get('klanten/{customer}/huidanalyses/search', 'HuidanalyseSearchController@index')
	     ->name('huidanalyses.search');
	Route::get('klanten/{customer}/huidanalyses/{huidanalyse}', 'HuidanalyseController@show')
	     ->name('huidanalyses.show');
	Route::get('klanten/{customer}/huidanalyses', 'HuidanalyseController@index')->name('huidanalyses.index');
	Route::delete('huidanalyses/{huidanalyse}', 'HuidanalyseController@destroy')->name('huidanalyses.destroy');
	Route::get('klanten/{customer}/huidanalyses/{huidanalyse}/bewerken', 'HuidanalyseController@edit')
	     ->name('huidanalyses.edit');
	Route::post('klanten/{customer}/huidanalyses', 'HuidanalyseController@store')->name('huidanalyses.store');
	Route::match([
			'put',
			'patch',
	], '/huidanalyses/{huidanalyse}', 'HuidanalyseController@update')->name('huidanalyses.update');

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
	], '/dagelijks-advies/{dailyAdvice}', 'DailyAdviceController@update')->name('dailyadvice.update');

	// Intake Routes
	Route::get('klanten/{customer}/intake/nieuw', 'IntakeController@create')->name('intake.create');
	Route::get('klanten/{customer}/intake/{intake}', 'IntakeController@show')->name('intake.show');
	Route::post('klanten/{customer}/intake', 'IntakeController@store')->name('intake.store');
	Route::delete('klanten/{customer}/intake/{intake}', 'IntakeController@destroy')->name('intake.destroy');
	Route::get('klanten/{customer}/intake/{intake}/bewerken', 'IntakeController@edit')->name('intake.edit');
	Route::match([
			'put',
			'patch',
	], 'klanten/{customer}/intake/{intake}', 'IntakeController@update')->name('intake.update');
});
