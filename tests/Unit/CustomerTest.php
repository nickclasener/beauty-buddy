<?php

namespace Tests\Unit;

use App\Customer;
use App\Intake;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
	use RefreshDatabase;
	
	protected $customer;
	
	public function setUp()
	{
		parent::setUp();
		$this->customer = create(Customer::class);
	}
	
	
	/** @test */
	function a_customer_has_a_path()
	{
		$this->assertEquals("/klanten/{$this->customer->slug}",
						$this->customer->path()
		);
	}
	
	/** @test */
	function a_customer_has_a_basePath_for_notes()
	{
		$this->assertEquals("/klanten/{$this->customer->slug}/notities",
						$this->customer->notesBasePath()
		);
	}
	
	/** @test */
	function a_customer_has_a_creator()
	{
		$this->assertInstanceOf(User::class, $this->customer->creator);
	}
	
	/** @test */
	function a_customer_has_many_notes()
	{
		$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->customer->notes);
	}
	
	/** @test */
	function a_customer_has_a_intake()
	{
		create(Intake::class, ['customer_id' => $this->customer->id]);
		$this->assertInstanceOf('Illuminate\Database\Eloquent\Model', $this->customer->intake);
	}
	
	/** @test */
	function a_customer_can_add_a_note()
	{
		$this->customer->addNote([
						'body'    => 'FooBar',
						'date'    => '20-20-1991',
						'user_id' => 1,
		]);
		
		$this->assertDatabaseHas('notes', ['body' => 'FooBar']);
		$this->assertCount(1, $this->customer->notes);
	}
	
	/** @test */
	function a_customer_automatically_sets_the_slug_on_create()
	{
		$customer = create(Customer::class, ['naam' => 'John Doe']);
		
		$this->assertEquals('john-doe', $customer->slug);
	}
	
	/** @test */
	function a_customer_will_always_increment_a_slug_if_its_a_duplicate()
	{
		create(Customer::class, ['naam' => 'John Doe']);
		create(Customer::class, ['naam' => 'John Doe']);
		$latestCustomer = create(Customer::class, ['naam' => 'John Doe']);
		
		$this->assertEquals('john-doe-2', $latestCustomer->slug);
		
	}
	
	
}
