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


use App\Repository\CustomersRepository;
use App\Repository\NotesRepository;

Auth::routes();

//Route::get('/', function () {
//	return view('notes.notes');
//});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', function () {
		return view('klanten.create');
	});

//	Route::get('/home', 'HomeController@index')->name('home');
	// Klanten Routes
	Route::get('klanten/search', function (CustomersRepository $repository) {
		$customer = $repository->search((string) request('q'));
		
		return compact('customer');
	});
	Route::get('klanten', 'CustomersController@index')->name('klanten.index');
	Route::delete('klanten/{customer}', 'CustomersController@destroy')->name('klanten.destroy');
	Route::get('klanten/nieuw', 'CustomersController@create')->name('klanten.create');
	Route::get('klanten/{customer}', 'CustomersController@show')->name('klanten.show');
	Route::post('klanten', 'CustomersController@store')->name('klanten.store');
	Route::get('klanten/{customer}/bewerken', 'CustomersController@edit')->name('klanten.edit');
	Route::match([
					'PATCH',
					'PUT',
	], 'klanten/{customer}', 'CustomersController@update')->name('klanten.update');
	
	// Notitie Routes
	Route::get('klanten/{customer}/notities/search', function (NotesRepository $repository) {
//	Route::get('notities/search', function (NotesRepository $repository) {
		$note = $repository->search((string) request('q'));
		
		return compact('note');
	});
	
	Route::delete('/notities/{note}', 'NotesController@destroy')->name('notities.destroy');
	Route::get('klanten/{customer}/notities/nieuw', 'NotesController@create')->name('notities.create');
//	Route::get('klanten/{customer}/notities', 'NotesController@show')->name('notities.show');
	Route::get('klanten/{customer}/notities', 'NotesController@index')->name('notities.index');
	Route::get('klanten/{customer}/notities/{notes}', 'NotesController@show')->name('notities.show');
	Route::get('klanten/{customer}/notities/{notes}/bewerken', 'NotesController@edit')->name('notities.edit');
	Route::post('klanten/{customer}/notities', 'NotesController@store')->name('notities.store');
	Route::match([
					'put',
					'patch',
	], '/notities/{note}', 'NotesController@update')->name('notities.update');
	
	
	// Intake Routes
	Route::post('klanten/{customer}/intake', 'IntakeController@store')->name('intake.store');
	Route::get('klanten/{customer}/intake/nieuw', 'IntakeController@create')->name('intake.create');
	Route::delete('klanten/{customer}/intake/{intake}', 'IntakeController@destroy')->name('intake.destroy');
	Route::get('klanten/{customer}/intake/{intake}/bewerken', 'IntakeController@edit')->name('intake.edit');
	Route::match([
					'put',
					'patch',
	], 'klanten/{customer}/intake/{intake}', 'IntakeController@update')->name('intake.update');
	
});
