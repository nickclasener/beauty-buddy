<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Spatie\Image\Image;

class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/klanten/antonietta-auer/notities';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	public function showLoginForm()
	{
		if (!asset('img/login5.jpg')) {
			Image::load('img/login.jpg')->width(1024)->blur(30)->optimize()->save('img/login5.jpg');
		}
		$image = true;

		return view('auth.login')->with(['image' => $image]);
	}
}
