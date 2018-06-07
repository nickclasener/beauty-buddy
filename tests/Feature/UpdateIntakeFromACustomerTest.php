<?php

namespace Tests\Feature;

use App\Customer;
use App\Intake;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function route;

class UpdateIntakeFromACustomerTest extends TestCase
{
	use RefreshDatabase;
	
	private $intake;
	private $customer;
	
	public function setUp()
	{
		parent::setUp();
		$this->customer = create(Customer::class, ['id' => 1]);
		$this->intake = create(Intake::class, [
						'id'          => 1,
						'customer_id' => 1,
						'behandeling' => 'A falsis, parma teres poeta.',
		]);
	}
	
	/** @test */
	function an_unauthenticated_user_cannot_update_a_intake_of_a_customer()
	{
		$this->withExceptionHandling();
		
		$this->get(route('intake.edit', [$this->customer, $this->intake]))
						->assertRedirect('/login');
		
		$this->patch(route('intake.update', [$this->customer, $this->intake]), $this->intake->toArray())
						->assertRedirect('/login');
	}
	
	/** @test */
	function an_authenticated_user_can_update_a_intake_of_a_customer()
	{
		$this->signIn()->withoutExceptionHandling();
		$intake = make(Intake::class, [
						'id'          => 1,
						'behandeling' => 'Resistere solite ducunt ad camerarius habena.',
		]);
		
		$response = $this->put(route('intake.update', [$this->customer, $intake]), $intake->toArray());
		
		$this->get($response->headers->get('Location'))
						->assertSee('Resistere solite ducunt ad camerarius habena.');
		
	}
}
