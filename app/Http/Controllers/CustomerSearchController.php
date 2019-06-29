<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerRule;
use Request;

class CustomerSearchController extends Controller
{
	public function index ( Request $request )
	{
		$query = (string)request('q');

		$customers = Customer
				::search($query)
				->where('user_id', auth()->id())
				->rule(CustomerRule::class)
				->from(0)->take(20)
				->get();

		return view('layouts._search-results')->with([ 'customers' => $customers ]);
	}
}
