<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Huidanalyse;
use App\HuidanalyseRule;
use Request;

class HuidanalyseSearchController extends Controller
{
	public function index ( Customer $customer, Request $request )
	{
		$query = (string)request('q');

		$huidanalyses = Huidanalyse
				::search($query)
				->where('user_id', auth()->id())
				->where('customer_id', $customer->id)
				->rule(HuidanalyseRule::class)
				->from(0)->take(10)
				->get();
		if ( count($huidanalyses) === 0 ) {
			return null;
		}

		return view('klanten.note._list')
				->with([
						'models'     => $huidanalyses,
						'searched'   => true,
						'stimulusJs' => 'huidanalyse',
				]);
	}
}
