<?php

namespace Tests\Feature;

use App\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateCustomerTest extends TestCase {
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
	function the_edit_page_shows_the_coresponding_values()
	{
		$this->signIn();
		
		$this->get($this->customer->path() . '/edit')
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
	function an_authenticated_user_can_update_a_customer()
	{
		$this->signIn()->withExceptionHandling()->updatedCustomer();
		
		$response = $this->patch($this->customer->path(), $this->customer->toArray());
		$response->assertSee('my-new-name');
		$this->get($response->headers->get('Location'))
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
	function an_unauthenticated_user_cannnot_update_a_customer()
	{
		$this->withExceptionHandling();
		
		$this->get($this->customer->path() . '/edit')
						->assertRedirect('/login');
		
		$this->patch($this->customer->path(), $this->customer->toArray())
						->assertRedirect('/login');
	}
	
	public function updatedCustomer()
	{
		$this->get($this->customer->path() . '/edit')
						->assertStatus(200);
		$this->customer->naam = 'My new Name';
		$this->customer->email = 'mynewemail@email.com';
		$this->customer->adres = 'ikleefnuhier';
		$this->customer->huisnummer = '8';
		$this->customer->postcode = '6986AK';
		$this->customer->plaats = 'Angerlo';
		$this->customer->telefoon = '0313-484247';
		$this->customer->mobiel = '0631231940';
		$this->customer->geboortedatum = '20-12-1991';
	}
}
