<?php

namespace Tests\Unit;

use App\Customer;
use App\Intake;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IntakeTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	function intake_has_a_customer ()
	{
		$intake = factory(Intake::class)->create();

		$this->assertInstanceOf(Customer::class, $intake->customer);
	}
}
