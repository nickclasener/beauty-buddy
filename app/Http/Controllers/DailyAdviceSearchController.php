<?php

namespace App\Http\Controllers;

use App\Customer;
use App\DailyAdvice;
use App\DailyAdviceRule;
use Request;

class DailyAdviceSearchController extends Controller
{
	public function index ( Customer $customer, Request $request )
	{
		$query = (string)request('q');

		$dailyAdvices = DailyAdvice
				::search($query)
				->where('user_id', auth()->id())
				->where('customer_id', $customer->id)
				->rule(DailyAdviceRule::class)
				->from(0)->take(10)
				->get();
		if ( count($dailyAdvices) === 0 ) {
			return null;
		}

		return view('klanten.dailyadvice._search-results')
				->with([
						'dailyAdvices' => $dailyAdvices,
						'searched'     => true,
						'unsetDelete'  => false,
				]);
	}
}
