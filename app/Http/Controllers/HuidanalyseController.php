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
		$huidanalyses = $customer->huidanalyses()
		                         ->orderByDesc('created_at')->get();
		//				              ->orderByDesc('created_at')
		//		                  ->paginate(15);
		return view('klanten.huidanalyses.index')->with([
				'customer'     => $customer,
				'huidanalyses' => $huidanalyses,
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
			$huidanalyse = $customer->addHuidanalyse([
					'user_id' => auth()->id(),
					'body'    => request('body'),
			]);
			$huidanalyses = $customer->huidanalyses()
			                         ->where('user_id', $huidanalyse->user_id)
			                         ->whereYear('created_at', $huidanalyse->created_at)
			                         ->whereMonth('created_at', $huidanalyse->created_at)
			                         ->get();

			if ( count($huidanalyses) === 1 ) {
				return response(
						$content = view('klanten.huidanalyses._monthyear')->with([
								'customer'         => $customer,
								'huidanalyses'     => $huidanalyses,
								'monthYear'        => monthYearFormat($huidanalyse),
								'monthyearCreated' => $huidanalyse->id,
						]),
						200,
						[ 'monthyear' ]
				);
			}

			return response(
					$content = view('klanten.huidanalyses.show')->with([
							'customer'           => $customer,
							'huidanalyse'        => $huidanalyse,
							'huidanalyseCreated' => $huidanalyse->id,
					]),
					200,
					[ 'huidanalyse' ]
			);

			//			return view('klanten.huidanalyses._list')->with([
			//					'customer' => $customer,
			//					//								'customer' => $customer,
			//					'created'  => $huidanalyse->id,
			//			]);
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

		if ( request()->ajax() ) {
			$huidanalyse->update(request()->all());

			return view('klanten.huidanalyses.show')->with([
					'customer'    => $huidanalyse->customer,
					'huidanalyse' => $huidanalyse,
			]);
		}
		$huidanalyse->update(request()->all());

		return redirect(route('huidanalyses.index', [
				'customer' => $huidanalyse->customer,
		]));
	}

	public function destroy ( Huidanalyse $huidanalyse )
	{
		if ( request()->ajax() ) {
			$customer = $huidanalyse->customer;
			$huidanalyse->delete();

			//			return response(count($customer->huidanalyses));
			return response(null, array_first($customer->huidanalyses) ? 200 : 205);
			//			return response(array_first($customer->huidanalyses) ? 200 : 205);
		}
		$huidanalyse->delete();

		return back();
	}

}
