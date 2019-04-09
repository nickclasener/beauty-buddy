<?php

namespace Tests\Unit;

use App\Customer;
use App\Huidanalyse;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HuidanalyseTest extends TestCase
{
	use RefreshDatabase;

	private $customer;
	private $huidanalyse;

	public function setUp ()
	{
		parent::setUp();

		$this->customer = create(Customer::class);
		$this->huidanalyse = create(Huidanalyse::class, [ 'customer_id' => $this->customer->id ]);
	}

	/** @test */
	function a_huidanalyse_has_a_owner ()
	{
		$this->assertInstanceOf(User::class, $this->huidanalyse->creator);
	}

	/** @test */
	function a_huidanalyse_belongs_to_a_customer ()
	{
		$this->assertInstanceOf(Customer::class, $this->huidanalyse->customer);
	}
}
