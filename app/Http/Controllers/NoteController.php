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

		$notes = Note::where([ 'customer_id' => $customer->id ])->orderByDesc('created_at')->get();

		return view('klanten.note.index')->with([
				'customer'    => $customer,
				'models'      => $notes,
				'placeholder' => 'Zoek in Notities...',
				'stimulusJs'  => 'note',
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
		$note = $customer->addNote([
				'user_id' => auth()->id(),
				'body'    => request('body'),
		]);
		if ( request()->ajax() ) {
			$notes = $customer
					->notes()
					->where('user_id', $note->user_id)
					->whereYear('created_at', $note->created_at)
					->whereMonth('created_at', $note->created_at)
					->get();

			if ( count($notes) === 1 ) {
				return response(
						$content = view('klanten.note._monthyear')->with([
								'customer'         => $customer,
								'model'            => $notes,
								'monthYear'        => monthYearFormat($note),
								'monthyearCreated' => $note->id,
								'stimulusJs'       => 'note',
						]), 200, [ 'monthyear' ]);

			}

			return response(
					$content = view('klanten.note.show')->with([
							'customer'     => $customer,
							'model'        => $note,
							'modelCreated' => $note->id,
							'stimulusJs'   => 'note',
					]), 200, [ 'note' ]);
		}

		return redirect(route('note.index', [
				'customer'   => $customer,
				'stimulusJs' => 'note',
		]));
	}

	public function show ( Customer $customer, $id )
	{
		$note = Note::findOrFail($id);

		return view('klanten.note.show')->with([
				'customer'   => $customer,
				'model'      => $note,
				'stimulusJs' => 'note',
		]);
	}

	public function edit ( Customer $customer, $id )
	{
		$note = Note::findOrFail($id);

		return view('klanten.note.edit')->with([
				'customer'   => $customer,
				'model'      => $note,
				'stimulusJs' => 'note',
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

			return view('klanten.note.show')->with([
					'customer'   => $note->customer,
					'model'      => $note,
					'stimulusJs' => 'note',
			]);
		}
		$note->update(request()->all());

		return redirect(route('note.index', [
				'customer'   => $note->customer,
				'stimulusJs' => 'note',
		]));
	}

	public function destroy ( Note $note )
	{
		if ( request()->ajax() ) {
			$customer = $note->customer;
			$note->delete();

			return response(null, array_first($customer->notes) ? 200 : 205);
		}
		$note->delete();

		return back();
	}

}
