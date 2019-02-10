<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{

	public function index ( Customer $customer )
	{
		return view('notes.index', compact('customer'));
	}

	public function store ( Customer $customer, Request $request )
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

			$customer->addNote([
					'user_id' => auth()->id(),
					'body'    => request('body'),
			]);

			return view('notes._index', compact('customer'));

		}

		$customer->addNote([
				'user_id' => auth()->id(),
				'body'    => request('body'),
		]);

		return redirect($customer->path());
	}

	public function show ( Customer $customer, $id )
	{
		$note = Note::findOrFail($id);

		return view('notes.show', compact(
				'customer', 'note'
		));
	}

	public function edit ( Customer $customer, $id )
	{

		$note = Note::findOrFail($id);

		return view('notes.edit', compact(
				'customer',
				'note'
		));
	}

	public function update ( Note $note )
	{
		//		dd($note);
		//		$validator = Validator::make(request()->all(), [
		//				'body' => 'required',
		//		]);
		//
		//		if ( $validator->fails() ) {
		//			return back()
		//					->withErrors($validator)
		//					->withInput();
		//		}
		//
		//		if ( request()->ajax() ) {
		//			$note->update(request()->all());
		//
		//			return view('notes.show', compact(
		//					'note'
		//			));
		//		}
		$note->update(request()->all());

		return redirect($note->customer->path());
	}

	public function destroy ( Note $note )
	{
		if ( request()->ajax() ) {
			$note->delete();

			return 200;
		}

		$note->delete();

		return back();
	}

}
