<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function compact;
use function redirect;
use function view;

class NotesController extends Controller
{
	
	public function index(Customer $customer)
	{
		return view('notes.index', compact('customer'));
	}
	
	public function show(Customer $customer, Note $note)
	{

//		$note = Note::findOrFail($id);

//		return view('notes.show', compact('customer', 'note'));
		return view('notes.show', compact('customer'));
	}
	
	public function store(Customer $customer, Request $request)
	{
		$validator = Validator::make(request()->all(), [
						'body' => 'required',
		]);
		
		if ($validator->fails()) {
			return back()
							->withErrors($validator)
							->withInput();
		}
		
		if (request()->ajax()) {
			
			$customer->addNote([
							'user_id' => auth()->id(),
							'body'    => request('body'),
			]);
			
			return view('notes.show', compact('customer'));
			
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
		
		if (request()->ajax()) {
			
			$note->update(request()->all());
			
			return view('notes.show', compact('note'));
			
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
		if (request()->ajax()) {
			$note->delete();
			
			return 200;
		}
		
		$note->delete();

//		return back();
//		if (request()->expectsJson()) {
//			$note->delete();
//
////		return view('notes.index')->with($customer)->render();
//			return response([
//							'responsehtml' =>  view('notes.index')->render()->with($customer)
//											->render()
//							//							'responseURL' => $note->customer->path(),
//			]);
//		}
		
		return back();
	}
	
}
