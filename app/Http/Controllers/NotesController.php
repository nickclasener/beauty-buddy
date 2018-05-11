<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotesController extends Controller
{
	/**
	 * @param Customer $customer
	 * @param Request  $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function store(Customer $customer, Request $request)
	{
		
		$validator = Validator::make($request->all(), [
						'body' => 'required',
						'date' => 'nullable|date',
		]);
		
		if ($validator->fails()) {
			if ($request->expectsJson()) {
				return response()->json(['errors' => $validator->errors()]);
			}
		}
		
		$customer->addNote([
						'body' => request('body'),
		]);
		
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
	 * @param Note $note
	 * @param      $id
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
