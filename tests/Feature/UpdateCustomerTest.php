<?php

namespace Tests\Feature;

use App\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function create;

/**
 * @internal
 * @coversNothing
 */
final class UpdateCustomerTest extends TestCase
{
	use RefreshDatabase;

	public function testAnAuthenticatedUserCanUpdateACustomer ()
	{
		$this->signIn()->withoutExceptionHandling();
		$customer = make(Customer::class, [
				'naam'          => 'My new Name',
				'email'         => 'mynewemail@email.com',
				'straatnaam'    => 'ikleefnuhier',
				'huisnummer'    => '8',
				'postcode'      => '6986AK',
				'plaats'        => 'Angerlo',
				'telefoon'      => '0313-484247',
				'mobiel'        => '0631231940',
				'geboortedatum' => '20-12-1991',
		]);

		$response = $this->put($this->customer->path(), $customer->toArray());
		//		dd($response);
		//		dd($this->get($response->headers));
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

	public function testAnAuthenticatedUserCanEditACustomer ()
	{
		$this->signIn()->get($this->customer->path() . '/bewerken')
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

	public function testAnUnauthenticatedUserCannnotUpdateACustomer ()
	{
		$this->withExceptionHandling();

		$this->get($this->customer->path() . '/bewerken')
		     ->assertRedirect('/login');

		$this->patch($this->customer->path(), $this->customer->toArray())
		     ->assertRedirect('/login');
	}

	public function testACustomerRequiresANaam ()
	{
		$this->updateCustomer([ 'naam' => null ])
		     ->assertSessionHasErrors('naam');
	}

	protected function updateCustomer ( $overrides )
	{
		$this->withExceptionHandling()->signIn();

		$customer = make(Customer::class, $overrides);

		return $this->put($this->customer->path(), $customer->toArray());
	}

	public function testACustomerRequiresAEmail ()
	{
		$this->updateCustomer([ 'email' => null ])
		     ->assertSessionHasErrors('email');
	}

	public function testACustomerBirthdayIsADateFormat ()
	{
		$this->updateCustomer([ 'geboortedatum' => 'string' ])
		     ->assertSessionHasErrors('geboortedatum');
	}

	protected function setUp ()
	{
		parent::setUp();

		$this->customer = create(Customer::class, [
				'naam'          => 'example example',
				'email'         => 'example@hotmail.com',
				'geboortedatum' => '22-09-1960',
				'straatnaam'    => 'lararoad',
				'huisnummer'    => '8',
				'postcode'      => '4543lv',
				'plaats'        => 'laraville',
				'telefoon'      => '0316484247',
				'mobiel'        => '1234567893',
		]);
	}
}
