<?php

namespace Tests\Feature;

use App\Customer;
use App\DailyAdvice;
use App\Huidanalyse;
use App\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateCustomerTest extends TestCase
{
	use RefreshDatabase;
	private $customer;
	private $dailyAdvice;
	private $huidanalyse;
	private $note;

	public function setUp ()
	{
		parent::setUp();
		$this->signIn();
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
		$this->note = create(Note::class, [
				'id'          => 1,
				'customer_id' => $this->customer->id,
				'body'        => 'A falsis, parma teres poeta.',
		]);
		$this->huidanalyse = create(Huidanalyse::class, [
				'id'          => 1,
				'customer_id' => $this->customer->id,
				'body'        => 'Original huidanalyse',
		]);
		$this->dailyAdvice = create(DailyAdvice::class, [
				'customer_id' => $this->customer->id,
				'morning'     => 'Original Ochtend',
				'midday'      => 'Original Middag',
				'evening'     => 'Original Avond',
		]);
	}

	/** @test */
	public function an_authenticated_user_can_update_a_customer ()
	{
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
	public function an_authenticated_user_can_edit_a_customer ()
	{
		$this->get($this->customer->path() . '/bewerken')
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
	public function a_customer_requires_a_naam ()
	{
		$this->updateCustomer([ 'naam' => null ])
		     ->assertSessionHasErrors('naam');
	}

	protected function updateCustomer ( $overrides )
	{
		$customer = make(Customer::class, $overrides);

		return $this->put($this->customer->path(), $customer->toArray());
	}

	/** @test */
	public function a_customer_requires_a_email ()
	{
		$this->updateCustomer([ 'email' => null ])
		     ->assertSessionHasErrors('email');
	}

	/** @test */
	public function a_customer_birthday_is_a_date_format ()
	{
		$this->updateCustomer([ 'geboortedatum' => 'string' ])
		     ->assertSessionHasErrors('geboortedatum');
	}

	/** @test */
	function an_authenticated_user_can_update_a_note_of_a_customer ()
	{
		$note = make(Note::class, [
				'id'   => $this->note->id,
				'body' => 'Cur historia congregabo?',
		]);
		$response = $this->put(route('notities.update', $this->note), $note->toArray());

		$this->get($response->headers->get('Location'))
		     ->assertSee('Cur historia congregabo?');

	}

	/** @test */
	function an_authenticated_user_can_edit_a_note ()
	{
		$response = $this->get(route('notities.edit', [
				$this->customer,
				$this->note->id,
		]));
		$response->assertStatus(200)
		         ->assertSee('A falsis, parma teres poeta.');
	}

	/** @test */
	function an_authenticated_user_can_update_a_huidanalyse_of_a_customer ()
	{
		$huidanalyse = make(Huidanalyse::class, [
				'body' => 'Updated Huidanalyse',
		]);

		$response = $this->put(route('huidanalyses.update', $this->huidanalyse), $huidanalyse->toArray());
		$this->get($response->headers->get('Location'))
		     ->assertSee('Updated Huidanalyse');

	}

	/** @test */
	function an_authenticated_user_can_edit_a_huidanalyse ()
	{
		$response = $this->get(route('huidanalyses.edit', [
				$this->customer,
				$this->huidanalyse->id,
		]));
		$response->assertStatus(200)
		         ->assertSee('Original huidanalyse');
	}

}
