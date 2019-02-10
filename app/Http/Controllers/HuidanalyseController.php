<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Huidanalyse;
use Illuminate\Support\Facades\Validator;

class HuidanalyseController extends Controller
{
	public function index ( Customer $customer )
	{
		return view('huidanalyses.index', compact('customer'));
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

		//		if ( request()->ajax() ) {
		//
		//			$customer->addHuidanalyse([
		//					'user_id' => auth()->id(),
		//					'body'    => request('body'),
		//			]);
		//
		//			return view('huidanalyses._index', compact('customer'));
		//
		//		}

		$customer->addHuidanalyse([
				'user_id' => auth()->id(),
				'body'    => request('body'),
		]);

		return redirect(route('huidanalyses.index', compact('customer')));
	}

	public function show ( Customer $customer, $id )
	{
		$huidanalyse = Huidanalyse::findOrFail($id);

		return view('huidanalyses.show', compact('customer', 'huidanalyse'));
	}

	public function edit ( Customer $customer, $id )
	{

		$huidanalyse = Huidanalyse::findOrFail($id);

		return view('huidanalyses.edit', compact(
				'customer',
				'huidanalyse'
		));
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
		//		if ( request()->ajax() ) {
		//
		//			$huidanalyse->update(request()->all());
		//
		//			return view('huidanalyses.show', compact('huidanalyse'));
		//
		//		}
		$huidanalyse->update(request()->all());

		return redirect(route('huidanalyses.show', [
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
