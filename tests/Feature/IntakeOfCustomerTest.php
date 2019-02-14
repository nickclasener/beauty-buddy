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
	{
		parent::setUp();
		$this->signIn();
		$this->customer = create(Customer::class);
		$this->customer2 = create(Customer::class);
		$this->intake = create(Intake::class, [
				'id'          => 1,
				'customer_id' => $this->customer->id,
				'behandeling' => 'A falsis, parma teres poeta.',
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
	function a_authenticated_user_can_add_a_intake_to_a_customer ()
	{
		$this->withoutExceptionHandling();
		$intake = make(Intake::class, [ 'customer_id' => $this->customer2->id ]);

		$response = $this->post(route('intake.store', $this->customer2), $intake->toArray());
		$this->get($response->headers->get('Location'))
		     ->assertSee($intake->behandeling)
		     ->assertSee($intake->huidverbetering)
		     ->assertSee($intake->allergieen)
		     ->assertSee($intake->bijzonderheden)
		     ->assertSee($intake->bloeddruk)
		     ->assertSee($intake->chemisch)
		     ->assertSee($intake->cosmetisch)
		     ->assertSee($intake->diabetes)
		     ->assertSee($intake->eczeem)
		     ->assertSee($intake->huidkanker)
		     ->assertSee($intake->huidschimmel)
		     ->assertSee($intake->ipl)
		     ->assertSee($intake->kanker)
		     ->assertSee(checkbox($intake->bestraling))
		     ->assertSee(checkbox($intake->chemo))
		     ->assertSee(checkbox($intake->immunotherapie))
		     ->assertSee($intake->laser)
		     ->assertSee($intake->medicatie)
		     ->assertSee($intake->operaties)
		     ->assertSee($intake->zon)
		     ->assertSee(checkbox($intake->koortslip))
		     ->assertSee(checkbox($intake->roken))
		     ->assertSee(checkbox($intake->overgang))
		     ->assertSee(checkbox($intake->psoriasis))
		     ->assertSee(checkbox($intake->vitrigilo))
		     ->assertSee(checkbox($intake->zwanger));
	}
}
