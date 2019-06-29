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
//
//		$notes = Cache::remember('notes.' . $customer->id . '.all', 3600, static function () use ( $customer ) {
//			return Note::where([ 'customer_id' => $customer->id ])->orderByDesc('created_at')->get();
//			//			return $customer
//			//					->notes()
//			//					->orderByDesc('created_at')
//			//					->get();
//		});
		//
				$notes = $customer
						->notes()
						->orderByDesc('created_at')
						//				->paginate(10);
						->get();

		return view('klanten.notes.index')->with([
				'customer' => $customer,
				'notes'    => $notes,
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
						$content = view('klanten.notes._monthyear')->with([
								'customer'         => $customer,
								'notes'            => $notes,
								'monthYear'        => monthYearFormat($note),
								'monthyearCreated' => $note->id,
						]), 200, [ 'monthyear' ]);
			}

			return response(
					$content = view('klanten.notes.show')->with([
							'customer'    => $customer,
							'note'        => $note,
							'noteCreated' => $note->id,
					]), 200, [ 'note' ]);
		}

		return redirect(route('notes.index', [
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

		return redirect(route('notes.index', [
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
