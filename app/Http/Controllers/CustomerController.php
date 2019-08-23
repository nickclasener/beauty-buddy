<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function route;

class CustomerController extends Controller
{
	public function index()
	{

		$customers = Customer::where(['user_id' => auth()->id()])->get()->sortBy('naam', SORT_NATURAL | SORT_FLAG_CASE);

		return view('klanten.index')->with([
			'customers' => $customers,
		]);
	}

	public function create()
	{
		return view('klanten.create');
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'naam'          => 'required',
			'email'         => 'required|email',
			'geboortedatum' => 'nullable|date',
			//				'geboortedatum' => 'nullable|date_format:d-m-Y',
		]);
		if ($validator->fails()) {
			if (request()->ajax()) {
				return back()->with(422)
					->withErrors($validator)
					->withInput();
			}

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
		if (request()->ajax()) {

			return redirect(route('note.index', [
				$customer,
			], false));
		}

		return redirect(route('note.index', $customer, false));
	}

	public function show(Customer $customer)
	{
		return view('klanten.show')->with([
			'customer' => $customer,
		]);
	}

	public function edit(Customer $customer)
	{
		return view('klanten.edit')->with([
			'customer' => $customer,
		]);
	}

	public function update(Request $request, Customer $customer)
	{
		$validator = Validator::make($request->all(), [
			'naam'          => 'required',
			'email'         => 'required|email',
			'geboortedatum' => 'nullable|date:d-m-Y',
		]);

		if ($validator->fails()) {
			return back()
				->withErrors($validator)
				->withInput();
		}

		$customer->update([
			$request->except('geboortedatum'),
			'geboortedatum' => request('geboortedatum'),
		]);

		if (request()->ajax()) {
			return route('note.index', [
				'customer' => $customer,
			], false);
		}

		return redirect(route('note.index', [
			'customer' => $customer,
		], false));
	}

	public function destroy(Customer $customer)
	{
		$customer->delete();
		if (request()->ajax()) {
			return route('customer.create', [], false);
		}

		return redirect(route('customer.create', [], false));
	}
}
