<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Note;
use Illuminate\Support\Facades\Validator;
use function compact;
use function view;

class NotesController extends Controller
{
	
	public function index(Customer $customer, Note $note)
	{
		return view('notes.index', compact('customer'));
	}
	
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
			return back()
							->withErrors($validator)
							->withInput();
		}
		
		$customer->addNote([
						'user_id' => auth()->id(),
						'body'    => request('body'),
						'date'    => request('date'),
		]);
		
		return redirect($customer->path());
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param Note $note
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
	 */
	public function update(Note $note)
	{
		$validator = Validator::make(request()->all(), [
						'body' => 'required',
						'date' => 'nullable|date',
		]);
		
		if ($validator->fails()) {
			return back()
							->withErrors($validator)
							->withInput();
		}
		
		$note->update(request()->all());
		
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
