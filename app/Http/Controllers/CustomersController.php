<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function redirect;

class CustomersController extends Controller {
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index() {
		$customers = Customer::all();
		
		return view('klanten.index', compact('customers'));
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create() {
		return view('klanten.create');
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store(Request $request) {
		$validator = Validator::make($request->all(), [
						'naam'          => 'required',
						'email'         => 'required|email',
						'geboortedatum' => 'nullable|date',
		]);

		if ($validator->fails()) {

			return redirect('/klanten/create')->withErrors($validator)->withInput();
		}
		$customer = Customer::create([
						'user_id'       => auth()->id(),
						'naam'          => request('naam'),
						'adres'         => request('adres'),
						'huisnummer'    => request('huisnummer'),
						'postcode'      => request('postcode'),
						'plaats'        => request('plaats'),
						'telefoon'      => request('telefoon'),
						'mobiel'        => request('mobiel'),
						'email'         => request('email'),
						'geboortedatum' => request('geboortedatum'),
		]);
		
		
		return redirect($customer->path());
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param Customer $customer
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
	 */
	public function show(Customer $customer) {
//		return compact('customer');
//		dd(compact('customer'));

//		return view('klanten.show');
		return view('klanten.show', compact('customer'));
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int                      $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
