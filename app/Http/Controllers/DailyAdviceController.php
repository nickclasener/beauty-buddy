<?php

namespace App\Http\Controllers;

use App\Customer;
use App\DailyAdvice;

class DailyAdviceController extends Controller
{
	public function index ( Customer $customer )
	{
		return view('dailyadvice.index', compact('customer'));
	}

	//	public function create ( Customer $customer )
	//	{
	//		return view('dailyadvice.create', compact('customer'));
	//	}

	public function store ( Customer $customer )
	{
		$customer->addDailyAdvice([
				'user_id' => auth()->id(),
				'morning' => request('morning'),
				'midday'  => request('midday'),
				'evening' => request('evening'),
		]);

		return redirect(route('dailyadvice.index', compact('customer')));
	}

	public function show ( Customer $customer, $id )
	{
		$dailyAdvice = DailyAdvice::findOrFail($id);

		return view('dailyadvice.show', compact(
				'customer', 'dailyAdvice'
		));
	}

	public function edit ( Customer $customer, DailyAdvice $dailyAdvice )
	{
		return view('dailyadvice.edit', compact('customer', 'dailyAdvice'));
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
