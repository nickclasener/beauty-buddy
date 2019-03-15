<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Note;
use Illuminate\Support\Facades\Validator;
use Request;

class NoteController extends Controller
{

	public function index ( Customer $customer )
	{
		return view('klanten.notes.index')->with([
				'customer' => $customer,
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
			$note = $customer->addNote([
					'user_id' => auth()->id(),
					'body'    => request('body'),
			]);

//			return view('klanten.notes.show')->with([
//					'customer' => $customer,
//					'note'     => $note,
//					'created'  => $note->id,
//			]);
						return view('klanten.notes._list')->with([
								'customer' => $customer,
								'created'  => $note->id,
						]);
		}

		$customer->addNote([
				'user_id' => auth()->id(),
				'body'    => request('body'),
		]);

		return redirect(route('notities.index', [
				'customer' => $customer,
		]));
	}

	public function show ( Customer $customer, $id )
	{
		$note = Note::findOrFail($id);

		return view('klanten.notes.show')->with([
				'customer' => $customer,
				'note'     => $note,
		]);
	}

	public function edit ( Customer $customer, $id )
	{
		$note = Note::findOrFail($id);

		return view('klanten.notes.edit')->with([
				'customer' => $customer,
				'note'     => $note,
		]);
	}

	public function update ( Note $note, Request $request )
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
			$note->update(request()->all());

			return view('klanten.notes.show')->with([
					'customer' => $note->customer,
					'note'     => $note,
			]);
		}
		$note->update(request()->all());

		return redirect(route('notities.index', [
				'customer' => $note->customer,
		]));
	}

	public function destroy ( Note $note )
	{
		if ( request()->ajax() ) {
			$customer = $note->customer;
			$note->delete();

			//			return response(count($customer->notes));
			return response(null, array_first($customer->notes) ? 200 : 205);
			//			return response(array_first($customer->notes) ? 200 : 205);
		}
		$note->delete();

		return back();
	}

}
