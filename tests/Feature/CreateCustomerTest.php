<?php

namespace Tests\Feature;

use App\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateCustomerTest extends TestCase {
	use RefreshDatabase;
	
	/** @test */
	function a_unauthenticated_user_may_not_add_customer()
	{
		$this->withExceptionHandling();
		
		$this->get('/klanten/create')
						->assertRedirect('/login');
		$this->post('/klanten')
						->assertRedirect('/login');
	}
	
	/** @test */
	function a_authenticated_user_can_add_a_customer()
	{
		$this->withExceptionHandling()->signIn();
		$customer = make(Customer::class);
		
		$response = $this->post('/klanten', $customer->toArray());
		
		$this->get($response->headers->get('Location'))
						->assertSee($customer->naam)
						->assertSee($customer->adres)
						->assertSee($customer->huisnummer)
						->assertSee($customer->postcode)
						->assertSee($customer->plaats)
						->assertSee($customer->telefoon)
						->assertSee($customer->mobiel)
						->assertSee($customer->email)
						->assertSee($customer->geboortedatum);
	}
	
	/** @test */
	function a_customer_requires_a_email()
	{
		$this->createCustomer(['email' => null])
						->assertSessionHasErrors('email');
	}
	
	/** @test */
	function a_customer_birthday_is_a_date_format()
	{
		$this->createCustomer(['geboortedatum' => 'string'])
						->assertSessionHasErrors('geboortedatum');
	}
	
	/** @test */
	function a_customer_requires_a_naam()
	{
		$this->createCustomer(['naam' => null])
						->assertSessionHasErrors('naam');
	}
	
	/** @test */
	function a_unauthenticated_cannot_delete_a_customer()
	{
		$this->withExceptionHandling();
		
		$customer = create(Customer::class);
		
		$this->delete($customer->path())->assertRedirect('/login');
		
	}
	
	/** @test */
	public function authenticated_users_can_delete_customers()
	{
		$this->signIn();
		$customer = create(Customer::class, ['user_id' => auth()->id()]);
		
		$response = $this->json('DELETE', $customer->path());
		
		$response->assertStatus(200);
		$this->assertDatabaseMissing('customers', ['id' => $customer->id]);
		$this->assertEquals(0, Customer::count());
	}
	
	protected function createCustomer($overrides = [])
	{
		$this->withExceptionHandling()->signIn();
		
		$customer = make(Customer::class, $overrides);
		
		return $this->post('/klanten', $customer->toArray());
	}
	
}
