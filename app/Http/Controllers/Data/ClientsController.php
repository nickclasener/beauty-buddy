<?php

namespace App\Http\Controllers\Data;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function compact;
use function view;

class ClientsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index ()
	{
		$clients = Client::all();

		return view('klanten.data.clients', compact('clients'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create ()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store ( Request $request )
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Client $client
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show ( Client $client )
	{
		return view('klanten.data.client-notes', compact('client'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit ( $id )
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int                      $id
	 * @return \Illuminate\Http\Response
	 */
	public function update ( Request $request, $id )
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy ( $id )
	{
		//
	}
}
