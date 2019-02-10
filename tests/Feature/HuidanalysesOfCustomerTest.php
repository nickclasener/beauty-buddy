<?php

namespace Tests\Feature;

use App\Customer;
use App\Huidanalyse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HuidanalysesOfCustomerTest extends TestCase
{
	use RefreshDatabase;

	private $customer;
	private $huidanalyse;

	public function setUp ()
	{
		parent::setUp();
		$this->signIn();
		$this->customer = create(Customer::class, [
				'id'   => 1,
				'naam' => 'john doe',
		]);
		$this->huidanalyse = create(Huidanalyse::class, [
				'id'          => 1,
				'customer_id' => 1,
				'body'        => 'Original huidanalyse',
		]);
		create(Huidanalyse::class, [
				'id'          => 2,
				'customer_id' => 1,
		]);
	}

	/** @test */
	function an_authenticated_user_can_add_a_huidanalyse_to_a_customer ()
	{
		$huidanalyse = make(Huidanalyse::class, [
				'customer_id' => 1,
				'id'          => 3,
				'body'        => 'I exist :D',
		]);
		$this->post(route('huidanalyses.store', $this->customer), $huidanalyse->toArray());
		$this->assertDatabaseHas('huidanalyses', [ 'body' => 'I exist :D' ]);
	}

	/** @test */
	function a_huidanalyse_requires_a_body ()
	{
		$customer = create(Customer::class);
		$huidanalyse = make(Huidanalyse::class, [ 'body' => null ]);
		$this->post($customer->path() . '/huidanalyses', $huidanalyse->toArray())
		     ->assertSessionHasErrors('body');
	}

	/** @test */
	public function authenticated_can_delete_a_huidanalyse_from_a_customer ()
	{
		$this->delete(route('huidanalyses.destroy', $this->huidanalyse));
		$this->assertDatabaseMissing('huidanalyses', [ 'id' => 1 ]);
		$this->assertDatabaseHas('huidanalyses', [ 'id' => 2 ]);
		$this->assertDatabaseHas('customers', [ 'id' => 1 ]);
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

