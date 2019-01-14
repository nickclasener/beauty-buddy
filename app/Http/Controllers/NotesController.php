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
	
	public function show(Customer $customer, Note $note)
	{
		return view('notes.show', compact('customer'));
	}
	
	public function store(Customer $customer)
	{
		$validator = Validator::make(request()->all(), [
						'body' => 'required',
		]);
		
		if ($validator->fails()) {
			return back()
							->withErrors($validator)
							->withInput();
		}
		
		$customer->addNote([
						'user_id' => auth()->id(),
						'body'    => request('body'),
		]);
		
		return redirect($customer->path());
	}
	
	public function update(Note $note)
	{
		$validator = Validator::make(request()->all(), [
						'body' => 'required',
		]);
		
		if ($validator->fails()) {
			return back()
							->withErrors($validator)
							->withInput();
		}
		
		$note->update(request()->all());
		
		return redirect($note->customer->path());
	}
	
	public function edit(Customer $customer, $id)
	{
		
		$note = Note::findOrFail($id);
		
		
		return view('notes.edit', compact('note'));
	}
	
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
