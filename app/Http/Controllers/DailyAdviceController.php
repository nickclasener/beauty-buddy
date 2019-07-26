<?php

namespace App\Http\Controllers;

use App\Customer;
use App\DailyAdvice;
//use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class DailyAdviceController extends Controller
{
	//	public function __construct ()
	//	{
	//		App::setLocale('dynamic-filler');
	//	}

	public function index ( Customer $customer )
	{
		$dailyAdvices = DailyAdvice
				::where([ 'customer_id' => $customer->id ])
				->orderByDesc('created_at')
				->simplePaginate(5);

		return view('klanten.dailyadvice.index')
				->with([
						'customer'     => $customer,
						'dailyAdvices' => $dailyAdvices,
				]);
	}

	public function store ( Customer $customer )
	{
		$validator = Validator::make(request()->all(), [
				'morning' => 'required_without_all:midday,evening',
				'midday'  => 'required_without_all:morning,evening',
				'evening' => 'required_without_all:morning,midday',
		]);

		if ( $validator->fails() ) {
			return back()
					->withErrors($validator)
					->withInput();
		}
		$dailyAdvice = $customer->addDailyAdvice([
				'user_id' => auth()->id(),
				'morning' => request('morning'),
				'midday'  => request('midday'),
				'evening' => request('evening'),
		]);
		if ( request()->ajax() ) {
			$dailyAdvices = $customer
					->dailyAdvices()
					->where('user_id', $dailyAdvice->user_id)
					->whereYear('created_at', $dailyAdvice->created_at)
					->whereMonth('created_at', $dailyAdvice->created_at)
					->get();
			if ( count($dailyAdvices) === 1 ) {
				return response(
						$content = view('klanten.dailyadvice._monthyear')->with([
								'customer'         => $customer,
								'dailyAdvices'     => $dailyAdvices,
								'monthYear'        => monthYearFormat($dailyAdvice),
								'monthyearCreated' => $dailyAdvice->id,
						]), 200, [ 'monthyear' ]);
			}

			return response(
					$content = view('klanten.dailyadvice.show')->with([
							'customer'           => $customer,
							'dailyAdvice'        => $dailyAdvice,
							'dailyAdviceCreated' => $dailyAdvice->id,
					]), 200, [ 'dailyAdvice' ]);
		}

		return redirect(route('dailyadvice.index', [
				'customer'  => $customer,
				'monthYear' => monthYearFormat($dailyAdvice),
		]));
	}

	public function show ( Customer $customer, $id )
	{
		$dailyAdvice = DailyAdvice::findOrFail($id);

		return view('klanten.dailyadvice.show')->with([
				'customer'    => $customer,
				'dailyAdvice' => $dailyAdvice,
		]);
	}

	public function edit ( Customer $customer, $id )
	{
		$dailyAdvice = DailyAdvice::findOrFail($id);

		return view('klanten.dailyadvice.edit')->with([
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
