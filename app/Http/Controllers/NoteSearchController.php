<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Note;
use App\NoteRule;
use Request;

class NoteSearchController extends Controller
{
	public function index ( Customer $customer, Request $request )
	{
		$query = (string)request('q');

		$notes = Note
				::search($query)
				->where('user_id', auth()->id())
				->where('customer_id', $customer->id)
				->rule(NoteRule::class)
				->from(0)->take(10)
				->get();
		if ( count($notes) === 0 ) {
			return null;
		}

		return view('klanten.note._list')
				->with([
						'models'    => $notes,
						'searched' => true,
						'stimulusJs' => 'note',
				]);
	}
}
