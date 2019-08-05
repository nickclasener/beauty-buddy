<?php

namespace Tests\Feature;

use App\Customer;
use App\DailyAdvice;
use App\Huidanalyse;
use App\Intake;
use App\Note;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomersTest extends TestCase
{
	use RefreshDatabase;

	private $customer;
	private $dailyAdvice;
	private $huidanalyse;
	private $intake;
	private $note;

	public function setUp ()
	:void
	{
		parent::setUp();
		$this->signIn(create(User::class, [ 'id' => 1 ]));
		$this->customer = create(Customer::class, [
				'id'            => 1,
				'user_id'       => 1,
				'naam'          => 'Jane Doe',
				'email'         => 'jane@doe.com',
				'telefoon'      => '0564894576',
				'mobiel'        => '0668598654',
				'geboortedatum' => '20-12-1989',
				'straatnaam'    => 'laralane',
				'huisnummer'    => '18',
				'postcode'      => '5896 AB',
				'plaats'        => 'Laraville',
		]);
		$this->note = create(Note::class, [
				'customer_id' => $this->customer->id,
				'body'        => 'This is a note',
		]);
		$this->huidanalyse = create(Huidanalyse::class, [
				'customer_id' => $this->customer->id,
				'body'        => 'This is a huidanalyse',
		]);
		$this->dailyAdvice = create(DailyAdvice::class, [
				'customer_id' => $this->customer->id,
				'morning'     => 'Ochtend',
				'midday'      => 'Middag',
				'evening'     => 'Avond',
		]);
		$this->intake = create(Intake::class, [
				'customer_id'     => $this->customer->id,
				'behandeling'     => 'FooBar',
				'huidverbetering' => 'schimmel is verminderd',
				'allergieen'      => 'noten',
				'bijzonderheden'  => 'cookie',
				'bloeddruk'       => '120/80',
				'chemisch'        => 'Lorem Ipsum 1',
				'cosmetisch'      => 'Lorem Ipsum 2',
				'diabetes'        => 'Lorem Ipsum 3',
				'eczeem'          => 'Lorem Ipsum 4',
				'huidkanker'      => 'Lorem Ipsum 5',
				'huidschimmel'    => 'Lorem Ipsum 6',
				'ipl'             => 'Lorem Ipsum 7',
				'kanker'          => 'Lorem Ipsum 8',
				'bestraling'      => true,
				'chemo'           => false,
				'immunotherapie'  => false,
				'laser'           => 'Lorem Ipsum 9',
				'medicatie'       => 'Lorem Ipsum 10',
				'operaties'       => 'Lorem Ipsum 11',
				'zon'             => 'Lorem Ipsum 12',
				'koortslip'       => false,
				'roken'           => false,
				'overgang'        => false,
				'psoriasis'       => true,
				'vitrigilo'       => true,
				'zwanger'         => true,
		]);
	}

	/** @test */
	function a_user_can_view_a_customer ()
	{
		$this->get(route('customer.show', $this->customer))
		     ->assertStatus(200)
		     ->assertSee('Jane Doe')
		     ->assertSee('jane@doe.com')
		     ->assertSee('0564894576')
		     ->assertSee('0668598654')
		     ->assertSee('20-12-1991')
		     ->assertSee('laralane')
		     ->assertSee('18')
		     ->assertSee('5896 AB')
		     ->assertSee('Laraville');
	}

	/** @test */
	function a_user_can_view_multiple_customers ()
	{
		$this->get(route('customer.index'))
		     ->assertStatus(200)
		     ->assertSee($this->customer->naam)
		     ->assertSee($this->customer->email)
		     ->assertSee($this->customer->telefoon)
		     ->assertSee($this->customer->mobiel);
	}

	/** @test */
	function a_authenticated_user_can_add_a_customer ()
	{
		$this->withoutExceptionHandling();
		$customer = make(Customer::class);
		$response = $this->post(route('customer.store', $customer->toArray(), false));
		$this->get($response->headers->get('Location'))
		     ->assertSee(e($customer->naam))
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
	function a_customer_requires_a_email ()
	{
		$this->createCustomer([ 'email' => null ])
		     ->assertSessionHasErrors('email');
	}

	protected function createCustomer ( $overrides = [] )
	{
		$customer = make(Customer::class, $overrides);

		return $this->post('/klanten', $customer->toArray());
	}

	/** @test */
	function a_customer_birthday_is_a_date_format ()
	{
		$this->createCustomer([ 'geboortedatum' => 'string' ])
		     ->assertSessionHasErrors('geboortedatum');
	}

	/** @test */
	function a_customer_requires_a_naam ()
	{
		$this->createCustomer([ 'naam' => null ])
		     ->assertSessionHasErrors('naam');
	}

	/** @test */
	function view_a_note_on_a_customer_page ()
	{
		$response = $this->get(route('note.show', [
				$this->customer,
				$this->note,
		], false));
		$response->assertStatus(200)
		         ->assertSee('This is a note');
	}

	/** @test */
	function view_multiple_notes_on_a_customer_page ()
	{
		create(Note::class, [
				'body'        => 'foo',
				'customer_id' => $this->customer->id,
		]);
		create(Note::class, [
				'body'        => 'bar',
				'customer_id' => $this->customer->id,
		]);
		create(Note::class, [
				'body'        => 'baz',
				'customer_id' => $this->customer->id,
		]);
		$this->get(route('note.index', $this->customer))
		     ->assertStatus(200)
		     ->assertSee('This is a note')
		     ->assertSee('foo')
		     ->assertSee('bar')
		     ->assertSee('baz');
	}

	/** @test */
	function view_the_huidanalyse_on_a_customer_page ()
	{
		$this->get(route('huidanalyse.show', [
				$this->customer,
				$this->huidanalyse,
		]))
		     ->assertStatus(200)
		     ->assertSee('This is a huidanalyse');
	}

	/** @test */
	function view_multiple_huidanalyses_on_a_customer_page ()
	{
		create(Huidanalyse::class, [
				'body'        => 'foo',
				'customer_id' => 1,
		]);
		create(Huidanalyse::class, [
				'body'        => 'bar',
				'customer_id' => 1,
		]);
		create(Huidanalyse::class, [
				'body'        => 'baz',
				'customer_id' => 1,
		]);
		$this->get(route('huidanalyse.index', $this->customer))
		     ->assertStatus(200)
		     ->assertSee('This is a huidanalyse')
		     ->assertSee('foo')
		     ->assertSee('bar')
		     ->assertSee('baz');
	}

	/** @test */
	function view_the_intake_on_a_customer_page ()
	{
		$this->get(route('intake.show', [
				$this->customer,
				$this->intake,
		]))
		     ->assertStatus(200)
		     ->assertSee('FooBar')
		     ->assertSee('schimmel is verminderd')
		     ->assertSee('noten')
		     ->assertSee('cookie')
		     ->assertSee('120/80')
		     ->assertSee('Lorem Ipsum 1')
		     ->assertSee('Lorem Ipsum 2')
		     ->assertSee('Lorem Ipsum 3')
		     ->assertSee('Lorem Ipsum 4')
		     ->assertSee('Lorem Ipsum 5')
		     ->assertSee('Lorem Ipsum 6')
		     ->assertSee('Lorem Ipsum 7')
		     ->assertSee('Lorem Ipsum 8')
		     ->assertSee('1')
		     ->assertSee('0')
		     ->assertSee('0')
		     ->assertSee('Lorem Ipsum 9')
		     ->assertSee('Lorem Ipsum 10')
		     ->assertSee('Lorem Ipsum 11')
		     ->assertSee('Lorem Ipsum 12')
		     ->assertSee('0')
		     ->assertSee('0')
		     ->assertSee('0')
		     ->assertSee('1')
		     ->assertSee('1')
		     ->assertSee('1');
	}
}
