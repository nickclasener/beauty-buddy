<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Huidanalyse;
use Illuminate\Support\Facades\Validator;

class HuidanalyseController extends Controller
{
	public function index ( Customer $customer )
	{
		return view('klanten.huidanalyses.index')->with([
				'customer' => $customer,
		]);
	}

	public function store ( Customer $customer )
	{
		$validator = Validator::make(request()->all(), [
				'body' => 'required',
		]);

		if ( $validator->fails() ) {
			return back()
					->withErrors($validator)
					->withInput();
		}

		if ( request()->ajax() ) {

			$customer->addHuidanalyse([
					'user_id' => auth()->id(),
					'body'    => request('body'),
			]);

			return view('klanten.huidanalyses._index')->with([
					'customer' => $customer,
			]);

		}

		$customer->addHuidanalyse([
				'user_id' => auth()->id(),
				'body'    => request('body'),
		]);

		return redirect(route('huidanalyses.index', [
				'customer' => $customer,
		]));
	}

	public function show ( Customer $customer, $id )
	{
		$huidanalyse = Huidanalyse::findOrFail($id);

		return view('klanten.huidanalyses.show')->with([
				'customer'    => $customer,
				'huidanalyse' => $huidanalyse,
		]);
	}

	public function edit ( Customer $customer, $id )
	{

		$huidanalyse = Huidanalyse::findOrFail($id);

		return view('klanten.huidanalyses.edit')->with([
				'customer'    => $customer,
				'huidanalyse' => $huidanalyse,
		]);
	}

	public function update ( Huidanalyse $huidanalyse )
	{
		$validator = Validator::make(request()->all(), [
				'body' => 'required',
		]);

		if ( $validator->fails() ) {
			return back()
					->withErrors($validator)
					->withInput();
		}
		if ( request()->ajax() ) {

			$huidanalyse->update(request()->all());

			return view('huidanalyses.show')->with([
					'huidanalyse' => $huidanalyse,
			]);
		}
		$huidanalyse->update(request()->all());

		return redirect(route('huidanalyses.index', [
				$huidanalyse->customer,
				$huidanalyse,
		]));
	}

	public function destroy ( Huidanalyse $huidanalyse )
	{
		if ( request()->ajax() ) {
			$huidanalyse->delete();

			return 200;
		}
		$huidanalyse->delete();

		return back();
	}
}
