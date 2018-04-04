<?php

namespace Tests\Feature;

use App\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateCustomerTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	function a_unauthenticated_user_may_not_add_customer ()
	{
		$this->withExceptionHandling();

		$this->get('/klanten/create')
			->assertRedirect('/login');

		$this->post('/klanten')
			->assertRedirect('/login');
	}

	/** @test */
	function a_authenticated_user_can_add_a_customer ()
	{

		$this->withExceptionHandling()->signIn();

		// Act
		$customer = make(Customer::class, [ 'naam' => 'Jane Doe', 'slug' => 'jane-doe' ]);
		$this->post('/klanten', $customer->toArray());

		// Assert
//		dd($response);
		$this->get($customer->dataPath())
			->assertSee($customer->naam)
			->assertSee($customer->straatnaam)
			->assertSee($customer->huisnummer)
			->assertSee($customer->postcode)
			->assertSee($customer->plaats)
			->assertSee($customer->telefoon)
			->assertSee($customer->mobiel)
			->assertSee($customer->email)
			->assertSee($customer->geboortedatum);

	}

	/** @test */
	function a_customer_requires_a_naam ()
	{
		$this->createCustomer([ 'naam' => null ])
			->assertSessionHasErrors('naam');
	}

	public function createCustomer ( $overrides = [] )
	{
		$this->withExceptionHandling()->signIn();

		$customer = make(Customer::class, $overrides);

		return $this->post('/klanten', $customer->toArray());
	}

	/** @test */
	function a_customer_requires_a_email ()
	{
		$this->createCustomer([ 'email' => null ])
			->assertSessionHasErrors('email');
	}

	/** @test */
	function a_customer_birthday_is_a_date_format ()
	{
		$this->createCustomer([ 'geboortedatum' => 'string' ])
			->assertSessionHasErrors('geboortedatum');
	}

}
