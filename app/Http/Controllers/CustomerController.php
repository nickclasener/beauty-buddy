<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function route;

class CustomerController extends Controller
{
	public function index ()
	{
		$customers = Customer::all();

		return view('klanten.index')->with([
				'customers' => $customers,
		]);
	}

	public function create ()
	{
		return view('klanten.create');
	}

	public function store ( Request $request )
	{
		$validator = Validator::make($request->all(), [
				'naam'          => 'required',
				'email'         => 'required|email',
				'geboortedatum' => 'nullable|date',
		]);

		if ( $validator->fails() ) {
			return back()
					->withErrors($validator)
					->withInput();
		}

		$customer = Customer::create([
				'user_id'       => auth()->id(),
				'naam'          => request('naam'),
				'straatnaam'    => request('straatnaam'),
				'huisnummer'    => request('huisnummer'),
				'postcode'      => request('postcode'),
				'plaats'        => request('plaats'),
				'telefoon'      => request('telefoon'),
				'mobiel'        => request('mobiel'),
				'email'         => request('email'),
				'geboortedatum' => request('geboortedatum'),
		]);

		if ( request()->ajax() ) {
			return redirect(route('notities.index', $customer));
		}

		return redirect(route('notities.index', $customer));
	}

	public function show ( Customer $customer )
	{
		return view('klanten.show')->with([
				'customer' => $customer,
		]);
	}

	public function edit ( Customer $customer )
	{
		return view('klanten.edit')->with([
				'customer' => $customer,
		]);
	}

	public function update ( Request $request, Customer $customer )
	{
		$validator = Validator::make($request->all(), [
				'naam'          => 'required',
				'email'         => 'required|email',
				'geboortedatum' => 'nullable|date',
		]);

		if ( $validator->fails() ) {
			return back()
					->withErrors($validator)
					->withInput();
		}

		$customer->update($request->all());

		if ( request()->ajax() ) {
			return route('notities.index', [
					'customer' => $customer,
			]);
		}

		return redirect(route('notities.index', [
				'customer' => $customer,
		]));
	}

	public function destroy ( Customer $customer )
	{
		$customer->delete();
		if ( request()->ajax() ) {
			return route('klanten.create');
		}

		return redirect(route('klanten.create'));
	}
}
