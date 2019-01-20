<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Intake;
use function compact;
use function route;
use function view;

class IntakeController extends Controller
{
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @param $customer
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create(Customer $customer)
	{
		return view('intake.create', compact('customer'));
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Customer $customer
	 * @return \Illuminate\Http\Response
	 */
	public function store(Customer $customer)
	{
		$customer->addIntake([
						'user_id'         => auth()->id(),
						'behandeling'     => request('behandeling'),
						'huidverbetering' => request('huidverbetering'),
						'allergieen'      => request('allergieen'),
						'bijzonderheden'  => request('bijzonderheden'),
						'bloeddruk'       => request('bloeddruk'),
						'chemisch'        => request('chemisch'),
						'cosmetisch'      => request('cosmetisch'),
						'diabetes'        => request('diabetes'),
						'eczeem'          => request('eczeem'),
						'huidkanker'      => request('huidkanker'),
						'huidschimmel'    => request('huidschimmel'),
						'ipl'             => request('ipl'),
						'kanker'          => request('kanker'),
						'bestraling'      => request('bestraling'),
						'chemo'           => request('chemo'),
						'immunotherapie'  => request('immunotherapie'),
						'laser'           => request('laser'),
						'medicatie'       => request('medicatie'),
						'operaties'       => request('operaties'),
						'zon'             => request('zon'),
						'koortslip'       => request('koortslip'),
						'roken'           => request('roken'),
						'overgang'        => request('overgang'),
						'psoriasis'       => request('psoriasis'),
						'vitrigilo'       => request('vitrigilo'),
						'zwanger'         => request('zwanger'),
		]);
		
		return redirect($customer->path());
		//
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Intake $intake
	 * @return \Illuminate\Http\Response
	 */
	public function show(Intake $intake)
	{
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Intake $intake
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit(Intake $intake)
	{
		return view('notes.edit', compact('intake'));
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param Customer $customer
	 * @return \Illuminate\Http\Response
	 */
	public function update(Customer $customer)
	{
		$customer->updateIntake([
						'user_id'         => auth()->id(),
						'behandeling'     => request('behandeling'),
						'huidverbetering' => request('huidverbetering'),
						'allergieen'      => request('allergieen'),
						'bijzonderheden'  => request('bijzonderheden'),
						'bloeddruk'       => request('bloeddruk'),
						'chemisch'        => request('chemisch'),
						'cosmetisch'      => request('cosmetisch'),
						'diabetes'        => request('diabetes'),
						'eczeem'          => request('eczeem'),
						'huidkanker'      => request('huidkanker'),
						'huidschimmel'    => request('huidschimmel'),
						'ipl'             => request('ipl'),
						'kanker'          => request('kanker'),
						'bestraling'      => request('bestraling'),
						'chemo'           => request('chemo'),
						'immunotherapie'  => request('immunotherapie'),
						'laser'           => request('laser'),
						'medicatie'       => request('medicatie'),
						'operaties'       => request('operaties'),
						'zon'             => request('zon'),
						'koortslip'       => request('koortslip'),
						'roken'           => request('roken'),
						'overgang'        => request('overgang'),
						'psoriasis'       => request('psoriasis'),
						'vitrigilo'       => request('vitrigilo'),
						'zwanger'         => request('zwanger'),
		]);
		
		return redirect($customer->path());
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Customer $customer
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Customer $customer)
	{
		$customer->deleteIntake($customer);
		
		return redirect(route('klanten.show', $customer));
	}
}
