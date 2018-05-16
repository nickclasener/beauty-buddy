<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		//		$customers = Customer::paginate(10)->sortBy('naam');
		//		$customers = Customer::all()->sortBy('naam');
		$customers = Customer::all();
		
		return view('klanten.index', compact('customers'));
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('klanten.create');
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
						'naam'          => 'required',
						'email'         => 'required|email',
						'geboortedatum' => 'nullable|date',
		]);
		
		if ($validator->fails()) {
			return back()
							->withErrors($validator)
							->withInput();
		}
		
		$customer = Customer::create([
						'user_id'       => auth()->id(),
						'naam'          => request('naam'),
						'adres'         => request('adres'),
						'huisnummer'    => request('huisnummer'),
						'postcode'      => request('postcode'),
						'plaats'        => request('plaats'),
						'telefoon'      => request('telefoon'),
						'mobiel'        => request('mobiel'),
						'email'         => request('email'),
						'geboortedatum' => request('geboortedatum'),
		]);
		
		return redirect($customer->path());
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param Customer $customer
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
	 */
	public function show(Customer $customer)
	{
		return view('klanten.show', compact('customer'));
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Customer $customer
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit(Customer $customer)
	{
		return view('klanten.edit', compact('customer'));
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param Customer                  $customer
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
	 */
	public function update(Request $request, Customer $customer)
	{
		$validator = Validator::make($request->all(), [
						'naam'          => 'required',
						'email'         => 'required|email',
						'geboortedatum' => 'nullable|date',
		]);
		
		if ($validator->fails()) {
			return back()
							->withErrors($validator)
							->withInput();
		}
		
		$customer->update($request->all());
		
		return redirect($customer->path());
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Customer $customer
	 * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Exception
	 */
	public function destroy(Customer $customer)
	{
		$customer->delete();
		
		return redirect('/klanten');
	}
}
