<?php

namespace Tests\Feature;

use App\Customer;
use App\DailyAdvice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DailyAdviceOfCustomerTest extends TestCase
{
	use RefreshDatabase;

	private $customer;
	private $customer2;
	private $dailyAdvice;

	public function setUp ()
	{
		parent::setUp();
		$this->signIn();
		$this->customer = create(Customer::class);
		$this->customer2 = create(Customer::class);
		$this->dailyAdvice = create(DailyAdvice::class, [
				'customer_id' => $this->customer->id,
				'morning'     => 'Ochtend',
				'midday'      => 'Middag',
				'evening'     => 'Avond',
		]);
	}

	/** @test */
	function view_daily_advice_on_a_customer_page ()
	{
		$this->get(route('dailyadvice.show', [
				$this->customer,
				$this->dailyAdvice,
		]))
		     ->assertStatus(200)
		     ->assertSee('Ochtend')
		     ->assertSee('Middag')
		     ->assertSee('Avond');
	}

	//	/** @test */
	//	function an_authenticated_user_can_create_a_daily_advice_for_a_customer ()
	//	{
	//		//		$response = $this->withoutExceptionHandling()->get(route('dailyadvice.create', [
	//		$response = $this->get(route('dailyadvice.create', [
	//				$this->customer,
	//		]));
	//
	//		$response->assertStatus(200)
	//		         ->assertSee('name="morning"')
	//		         ->assertSee('name="midday"')
	//		         ->assertSee('name="evening"');
	//	}

	/** @test */
	function a_authenticated_user_can_add_a_daily_advice_to_a_customer ()
	{
		$dailyAdvice = make(DailyAdvice::class, [
				'customer_id' => $this->customer->id,
				'morning'     => 'Nieuwe Ochtend',
				'midday'      => 'Nieuwe Middag',
				'evening'     => 'Nieuwe Avond',
		]);

		$response = $this->withoutExceptionHandling()
		                 ->post(route('dailyadvice.store', $this->customer), $dailyAdvice->toArray());
		$this->get($response->headers->get('Location'))
		     ->assertStatus(200)
		     ->assertSee('Nieuwe Ochtend')
		     ->assertSee('Nieuwe Middag')
		     ->assertSee('Nieuwe Avond');
	}

	/** @test */
	function a_authenticated_user_can_add_multiple_daily_advices_to_a_customer_page ()
	{
		create(DailyAdvice::class, [
				'customer_id' => $this->customer->id,
				'morning'     => 'Nieuwe Ochtend',
				'midday'      => 'Nieuwe Middag',
				'evening'     => 'Nieuwe Avond',
		]);
		create(DailyAdvice::class, [
				'customer_id' => $this->customer->id,
				'morning'     => 'Nieuwe Ochtend2',
				'midday'      => 'Nieuwe Middag2',
				'evening'     => 'Nieuwe Avond2',
		]);

		$this->get(route('dailyadvice.index', $this->customer))
		     ->assertStatus(200)
		     ->assertSee('Ochtend')
		     ->assertSee('Middag')
		     ->assertSee('Avond')
		     ->assertSee('Nieuwe Ochtend')
		     ->assertSee('Nieuwe Middag')
		     ->assertSee('Nieuwe Avond')
		     ->assertSee('Nieuwe Ochtend2')
		     ->assertSee('Nieuwe Middag2')
		     ->assertSee('Nieuwe Avond2');
	}

	/** @test */
	function an_authenticated_user_can_update_the_daily_advice_of_a_customer ()
	{
		$dailyAdvice = make(DailyAdvice::class, [
				'morning' => 'Updated Ochtend',
				'midday'  => 'Updated Middag',
				'evening' => 'Updated Avond',
		]);

		$response = $this->put(route('dailyadvice.update', $this->dailyAdvice), $dailyAdvice->toArray());
		$this->get($response->headers->get('Location'))
				//		     ->assertStatus(200)
				 ->assertSee('Updated Ochtend')
		     ->assertSee('Updated Middag')
		     ->assertSee('Updated Avond');
	}

	/** @test */
	function an_authenticated_user_can_edit_the_daily_advice_of_a_customer ()
	{
		$response = $this->withoutExceptionHandling()->get(route('dailyadvice.edit', [
				$this->customer,
				$this->dailyAdvice,
		]));
		$response->assertStatus(200)
		         ->assertSee('Ochtend')
		         ->assertSee('Middag')
		         ->assertSee('Avond');
	}

	/** @test */
	public function authenticated_can_delete_a_huidanalyse_from_a_customer ()
	{
		create(DailyAdvice::class);
		$this->delete(route('dailyadvice.destroy', $this->dailyAdvice));
		$this->assertDatabaseMissing('daily_advices', [ 'id' => 1 ]);
		$this->assertDatabaseHas('daily_advices', [ 'id' => 2 ]);
		$this->assertDatabaseHas('customers', [ 'id' => 1 ]);
	}
}
