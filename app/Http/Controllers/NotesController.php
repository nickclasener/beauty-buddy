<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Note;
use Illuminate\Support\Facades\Validator;
use function compact;
use function view;

class NotesController extends Controller
{

//	public function show(Customer $customer, Note $note)
//	{
//		return view('notes.show', compact('customer'));
//	}
//
	/**
	 * @param Customer $customer
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function store(Customer $customer)
	{
		$validator = Validator::make(request()->all(), [
						'body' => 'required',
						'date' => 'nullable|date',
		]);
		
		if ($validator->fails()) {
			if (request()->expectsJson()) {
				return response()->json(['errors' => $validator->errors()], 422);
			}
		}
		
		$customer->addNote(request()->all());
		
		return view('notes.show', compact('customer'));
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param Note $note
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
	 */
	public function update(Note $note)
	{
//		dd(compact('note'));
		$validator = Validator::make(request()->all(), [
						'body' => 'required',
						'date' => 'nullable|date',
		]);
		
		if ($validator->fails()) {
			if (request()->expectsJson()) {
				return response()->json([
								'errors' => $validator->errors(),
				]);
			}
		}
		
		$note->update(request()->all());
		
		if (request()->expectsJson()) {
			return response($note->path());
		}
		
		return redirect($note->customer->path());
	}
	
	/**
	 * @param Customer $customer
	 * @param          $id
	 * @return Note|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit(Customer $customer, $id)
	{
		
		$note = Note::findOrFail($id);
		
		
		return view('notes.edit', compact('note'));
	}
	
	/**
	 * @param Note $note
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Symfony\Component\HttpFoundation\Response
	 * @throws \Exception
	 */
	public function destroy(Note $note)
	{
		$note->delete();
		if (request()->expectsJson()) {
			return response([
							'responseURL' => $note->customer->path(),
			]);
		}
		
		return back();
	}
	
}
