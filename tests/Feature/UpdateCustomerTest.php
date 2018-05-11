<?php

namespace Tests\Feature;

use App\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateCustomerTest extends TestCase
{
	
	use RefreshDatabase;
	
	public function setUp()
	{
		parent::setUp();
		
		$this->customer = create(Customer::class, [
						'naam'          => 'example example',
						'email'         => 'example@hotmail.com',
						'geboortedatum' => '22-09-1960',
						'adres'         => 'lararoad',
						'huisnummer'    => '8',
						'postcode'      => '4543lv',
						'plaats'        => 'laraville',
						'telefoon'      => '0316484247',
						'mobiel'        => '1234567893',
		]);
	}
	
	/** @test */
	function an_authenticated_user_can_update_a_customer()
	{
		$this->signIn();
		$customer = make(Customer::class, [
						'naam'          => 'My new Name',
						'email'         => 'mynewemail@email.com',
						'adres'         => 'ikleefnuhier',
						'huisnummer'    => '8',
						'postcode'      => '6986AK',
						'plaats'        => 'Angerlo',
						'telefoon'      => '0313-484247',
						'mobiel'        => '0631231940',
						'geboortedatum' => '20-12-1991',
		]);
		
		$response = $this->put($this->customer->path(), $customer->toArray());
		
		$this->get($response->headers->get('Location'))
						->assertSee('my-new-name')
						->assertSee('My new Name')
						->assertSee('mynewemail@email.com')
						->assertSee('ikleefnuhier')
						->assertSee('8')
						->assertSee('6986AK')
						->assertSee('Angerlo')
						->assertSee('0313-484247')
						->assertSee('0631231940')
						->assertSee('20-12-1991');
		
	}
	
	/** @test */
	function an_authenticated_user_can_edit_a_customer()
	{
		$this->signIn()->get($this->customer->path() . '/edit')
						->assertStatus(200)
						->assertSee('example example')
						->assertSee('example@hotmail.com')
						->assertSee('22-09-1960')
						->assertSee('lararoad')
						->assertSee('8')
						->assertSee('4543lv')
						->assertSee('laraville')
						->assertSee('0316484247')
						->assertSee('1234567893');
	}
	
	/** @test */
	function an_unauthenticated_user_cannnot_update_a_customer()
	{
		$this->withExceptionHandling();
		
		$this->get($this->customer->path() . '/edit')
						->assertRedirect('/login');
		
		$this->patch($this->customer->path(), $this->customer->toArray())
						->assertRedirect('/login');
	}
	
	/** @test */
	function a_customer_requires_a_naam()
	{
		$this->updateCustomer(['naam' => null])
						->assertJsonValidationErrors('naam');
	}
	
	/** @test */
	function a_customer_requires_a_email()
	{
		$this->updateCustomer(['email' => null])
						->assertJsonValidationErrors('email');
	}
	
	/** @test */
	function a_customer_birthday_is_a_date_format()
	{
		$this->updateCustomer(['geboortedatum' => 'string'])
						->assertJsonValidationErrors('geboortedatum');
	}
	
	protected function updateCustomer($overrides)
	{
		$this->withExceptionHandling()->signIn();
		
		$customer = make(Customer::class, $overrides);
		
		return $this->json('PUT', $this->customer->path(), $customer->toArray());
	}
	
}
