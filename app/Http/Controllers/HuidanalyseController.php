<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Huidanalyse;
use Illuminate\Support\Facades\Validator;
use Request;

class HuidanalyseController extends Controller
{
	public function index ( Customer $customer )
	{
		$huidanalyses = Huidanalyse
				::where([ 'customer_id' => $customer->id ])
				->orderByDesc('created_at')
				->simplePaginate(20);

		return view('klanten.noteAndHuidanalyse.index')->with([
				'customer'    => $customer,
				'models'      => $huidanalyses,
				'placeholder' => 'Zoek in Huidanalyses...',
				'stimulusJs'  => 'huidanalyse',
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
		$huidanalyse = $customer->addHuidanalyse([
				'user_id' => auth()->id(),
				'body'    => request('body'),
		]);
		if ( request()->ajax() ) {
			$huidanalyses = $customer
					->huidanalyses()
					->where('user_id', $huidanalyse->user_id)
					->whereYear('created_at', $huidanalyse->created_at)
					->whereMonth('created_at', $huidanalyse->created_at)
					->get();
			if ( count($huidanalyses) === 1 ) {
				return response(
						$content = view('klanten.noteAndHuidanalyse._monthyear')->with([
								'customer'         => $customer,
								'models'           => $huidanalyses,
								'monthYear'        => monthYearFormat($huidanalyse),
								'monthyearCreated' => $huidanalyse->id,
								'stimulusJs'       => 'huidanalyse',
						]), 200, [ 'monthyear' ]
				);
			}

			return response(
					$content = view('klanten.noteAndHuidanalyse.show')->with([
							'customer'     => $customer,
							'model'        => $huidanalyse,
							'modelCreated' => $huidanalyse->id,
							'stimulusJs'   => 'huidanalyse',
					]), 200, [ 'huidanalyse' ]);
		}

		return redirect(route('huidanalyse.index', [
				'customer'   => $customer,
				'stimulusJs' => 'huidanalyse',
		]));

	}

	public function show ( Customer $customer, $id )
	{
		$huidanalyse = Huidanalyse::findOrFail($id);

		return view('klanten.noteAndHuidanalyse.show')->with([
				'customer'   => $customer,
				'model'      => $huidanalyse,
				'stimulusJs' => 'huidanalyse',
		]);
	}

	public function edit ( Customer $customer, $id )
	{
		$huidanalyse = Huidanalyse::findOrFail($id);

		return view('klanten.noteAndHuidanalyse.edit')->with([
				'customer'   => $customer,
				'model'      => $huidanalyse,
				'stimulusJs' => 'huidanalyse',
		]);
	}

	public function update ( Huidanalyse $huidanalyse, Request $request )
	{
		$validator = Validator::make(request()->all(), [
				'body' => 'required',
		]);
		if ( $validator->fails() ) {
			return back()
					->withErrors($validator)
					->withInput();
		}
		$huidanalyse->update(request()->all());
		if ( request()->ajax() ) {
			return view('klanten.noteAndHuidanalyse.show')->with([
					'customer'   => $huidanalyse->customer,
					'model'      => $huidanalyse,
					'stimulusJs' => 'huidanalyse',
			]);
		}

		return redirect(route('huidanalyse.index', [
				'customer'   => $huidanalyse->customer,
				'stimulusJs' => 'huidanalyse',
		]));
	}

	public function destroy ( Huidanalyse $huidanalyse )
	{
		if ( request()->ajax() ) {
			$customer = $huidanalyse->customer;
			$huidanalyse->delete();

			return response(null, array_first($customer->huidanalyses) ? 200 : 205);
		}
		$huidanalyse->delete();

		return back();
	}

}
