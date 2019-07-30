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
		return view('intake.create')->with([
				'customer' => $customer,
		]);
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

		return redirect(route('intake.show', [
				'customer' => $customer,
				'intake'   => $customer->intake,
		]));
	}

	public function show ( Customer $customer, Intake $intake )
	{
		return view('intake.show')->with([
				'customer' => $customer,
				'intake'   => $intake,
		]);
	}

	public function edit ( Intake $intake )
	{
		return view('intake.edit')->with([
				'intake' => $intake,
		]);
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

		return redirect(route('intake.show', [
				'customer' => $customer,
				'intake'   => $customer->intake,
		]));
	}

	public function destroy ( Customer $customer )
	{
		$customer->deleteIntake();

		return redirect(route('customer.show', $customer));
	}
}
