<?php

namespace App\Http\Controllers;

use App\Customer;
use App\DailyAdvice;

class DailyAdviceController extends Controller
{
	public function index ( Customer $customer )
	{
		return view('dailyadvice.index')
				->with([
						'customer' => $customer,
				]);
	}

	//	public function create ( Customer $customer )
	//	{
	//		return view('dailyadvice.create')->with(['customer'));
	//	}

	public function store ( Customer $customer )
	{
		$customer->addDailyAdvice([
				'user_id' => auth()->id(),
				'morning' => request('morning'),
				'midday'  => request('midday'),
				'evening' => request('evening'),
		]);

		return redirect(route('dailyadvice.index', [
				'customer' => $customer,
		]));
	}

	public function show ( Customer $customer, $id )
	{
		$dailyAdvice = DailyAdvice::findOrFail($id);

		return view('dailyadvice.show')->with([
				'customer'    => $customer,
				'dailyAdvice' => $dailyAdvice,
		]);
	}

	public function edit ( Customer $customer, DailyAdvice $dailyAdvice )
	{
		return view('dailyadvice.edit')->with([
				'customer'    => $customer,
				'dailyAdvice' => $dailyAdvice,
		]);
	}

	public function update ( DailyAdvice $dailyAdvice )
	{
		$dailyAdvice->update(request()->all());

		return redirect(route('dailyadvice.show', [
				$dailyAdvice->customer,
				$dailyAdvice,
		]));
	}

	public function destroy ( DailyAdvice $dailyAdvice )
	{
		//		if ( request()->ajax() ) {
		//			$dailyAdvice->delete();

		//			return 200;
		//		}
		$dailyAdvice->delete();

		return back();
	}
}
