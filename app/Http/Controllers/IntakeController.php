<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Intake;

class IntakeController extends Controller
{

	public function index ()
	{
		//
	}

	public function create ( Customer $customer )
	{
		return view('intake.create', compact('customer'));
	}

	public function store ( Customer $customer )
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
	}

	public function show ( Intake $intake )
	{
		//
	}

	public function edit ( Intake $intake )
	{
		//		Review: below
		return view('notes.edit', compact('intake'));
	}

	public function update ( Customer $customer )
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

	public function destroy ( Customer $customer )
	{
		$customer->deleteIntake($customer);

		return redirect(route('klanten.show', $customer));
	}
}
