<?php

namespace Tests\Feature;

use App\Customer;
use App\Intake;
use App\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewCustomersTest extends TestCase
{
	use RefreshDatabase;

	private $customer;

	public function setUp ()
	{
		parent::setUp();
		$this->customer = create(Customer::class, [
			'naam'          => 'Jane Doe',
			'email'         => 'jane@doe.com',
			'telefoon'      => '0564894576',
			'mobiel'        => '0668598654',
			'geboortedatum' => '20-12-1991',
			'straatnaam'    => 'laralane',
			'huisnummer'    => '18',
			'postcode'      => '5896 AB',
			'plaats'        => 'Laraville',
		]);

		$this->signIn();
	}

	/** @test */
	function a_user_can_view_a_customer ()
	{
		// To make sure stimulus request’s the data
		$this->get($this->customer->path())
			->assertStatus(200)
			->assertSee('data-content-loader-url="' . $this->customer->dataPath());

		$this->get($this->customer->dataPath())
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
		$this->get('klanten')
			->assertStatus(200)
			->assertSee('data-content-loader-url="/data/klanten"');

		$this->get('/data/klanten')
			->assertStatus(200)
			->assertSee($this->customer->naam)
			->assertSee($this->customer->email)
			->assertSee($this->customer->telefoon)
			->assertSee($this->customer->mobiel);

	}

	/** @test */
	function a_user_can_view_all_notes_of_a_customer ()
	{
		create(Note::class, [
			'customer_id' => $this->customer->id,
			'body'        => 'This is body',
		], 2);

		$this->get($this->customer->path())
			->assertStatus(200)
			->assertSee('data-content-loader-url="' . $this->customer->dataPath());

		$this->get($this->customer->dataPath())
			->assertStatus(200)
			->assertSee('This is body');
	}

	/** @test */
	function a_user_can_view_the_intake_of_a_customer ()
	{
		create(Intake::class, [
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
			'immunotherapi'   => false,
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

//		dd($this->customer->intake->bestraling);
		$this->get($this->customer->path())
			->assertStatus(200)
			->assertSee('data-content-loader-url="' . $this->customer->dataPath());

		$this->get($this->customer->dataPath())
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
