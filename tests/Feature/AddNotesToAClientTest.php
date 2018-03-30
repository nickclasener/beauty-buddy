<?php

namespace Tests\Feature;

use App\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddNotesToACustomerTest extends TestCase
{

	use RefreshDatabase;

	private $customer;

	public function setUp ()
	{
		parent::setUp();

		$this->customer = create(Customer::class);

	}

//	/** @test */
//	function a_user_can_add_a_note_to_a_customer ()
//	{
//	}
}
