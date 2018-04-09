<?php

namespace Tests\Unit;

use App\Customer;
use App\Intake;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase {
	use RefreshDatabase;
	
	protected $customer;
	
	public function setUp() {
		parent::setUp();
		$this->customer = create(Customer::class);
	}
	
	/** @test */
	function a_customer_has_a_path() {
		$this->assertEquals("/klanten/{$this->customer->slug}",
						$this->customer->path()
		);
		
	}
	
	/** @test */
	function a_customer_has_a_creator() {
		$this->assertInstanceOf(User::class, $this->customer->creator);
	}
	
	/** @test */
	function a_customer_has_many_notes() {
		$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->customer->notes);
	}
	
	/** @test */
	function a_customer_has_a_intake() {
		create(Intake::class, ['customer_id' => $this->customer->id]);
		$this->assertInstanceOf('Illuminate\Database\Eloquent\Model', $this->customer->intake);
	}
	
}
