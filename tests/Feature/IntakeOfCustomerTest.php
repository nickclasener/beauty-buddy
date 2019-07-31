<?php

namespace Tests\Feature;

use App\Customer;
use App\Intake;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IntakeOfCustomerTest extends TestCase
{
	use RefreshDatabase;

	private $customer;
	private $customer2;
	private $intake;

	public function setUp ()
	:void
	{
		parent::setUp();
		$this->signIn();
		$this->customer = create(Customer::class);
		$this->customer2 = create(Customer::class);
		$this->intake = create(Intake::class, [
				'id'              => 1,
				'user_id'         => 1,
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
				'laser'           => 'Lorem Ipsum 9',
				'medicatie'       => 'Lorem Ipsum 10',
				'operaties'       => 'Lorem Ipsum 11',
				'zon'             => 'Lorem Ipsum 12',
				'bestraling'      => true,
				'chemo'           => false,
				'immunotherapie'  => false,
				'koortslip'       => false,
				'roken'           => false,
				'overgang'        => false,
				'psoriasis'       => true,
				'vitrigilo'       => true,
				'zwanger'         => true,
		]);
	}

	/** @test */
	function an_authenticated_user_can_update_a_intake_of_a_customer ()
	{
		$intake = make(Intake::class, [
				'id'          => $this->intake->id,
				'behandeling' => 'Resistere solite ducunt ad camerarius habena.',
		]);

		$response = $this->put(route('intake.update', [
				$this->customer,
				$intake,
		]), $intake->toArray());

		$this->get($response->headers->get('Location'))
		     ->assertSee('Resistere solite ducunt ad camerarius habena.');
	}

	/** @test */
	function a_authenticated_user_can_add_a_intake_to_a_customer_via_json ()
	{
		$this->withoutExceptionHandling();
		$intake = make(Intake::class, [ 'customer_id' => $this->customer2->id ]);

		$this->json('post', route('intake.store', $this->customer2), $intake->toArray());
		$this->assertDatabaseHas('intakes', $this->intakeAddResultsArray());
	}

	/** @test */
	function a_authenticated_user_can_add_a_intake_to_a_customer ()
	{
		$this->withoutExceptionHandling();
		$intake = make(Intake::class, [ 'customer_id' => $this->customer2->id ]);

		$this->post(route('intake.store', $this->customer2), $intake->toArray());
		$this->assertDatabaseHas('intakes', $this->intakeAddResultsArray());
	}

	private function intakeAddResultsArray ()
	{
		return [
				'id'              => 1,
				'user_id'         => 1,
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
		];
	}
}
