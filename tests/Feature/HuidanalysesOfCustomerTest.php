<?php

namespace Tests\Feature;

use App\Customer;
use App\Huidanalyse;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HuidanalysesOfCustomerTest extends TestCase
{
	use RefreshDatabase;

	private $customer;
	private $huidanalyse;

	public function setUp ():void
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
				'user_id'     => 1,
				'body'        => 'Foo',
				'created_at'  => Carbon::tomorrow(),
		]);

		create(Huidanalyse::class, [
				'id'          => 2,
				'customer_id' => 1,
				'user_id'     => 1,
				'created_at'  => Carbon::yesterday(),
		]);
	}

	/** @test */
	function an_authenticated_user_can_add_a_huidanalyse_to_a_customer_via_ajax ()
	{

		// Arrange
		$huidanalyse = make(Huidanalyse::class, [
				'id'          => 3,
				'customer_id' => 1,
				'user_id'     => 1,
				'body'        => 'I exist ajax :D',
		]);
		// Act
		//		TODO: create the ajax stimulus js tests
		//		$this->json('post', route('huidanalyse.store', $this->customer), $huidanalyse->toArray())->assertExactJson($huidanalyse);
		$this->json('post', route('huidanalyse.store', $this->customer), $huidanalyse->toArray());

		$this->assertDatabaseHas('huidanalyses', [ 'body' => 'I exist ajax :D' ]);
	}

	/** @test */
	function an_authenticated_user_can_add_a_huidanalyse_to_a_customer ()
	{
		// Arrange
		$huidanalyse = make(Huidanalyse::class, [
				'customer_id' => 1,
				'id'          => 3,
				'body'        => 'I exist :D',
		]);
		// Act
		$this->post(route('huidanalyse.store', $this->customer), $huidanalyse->toArray());

		$this->assertDatabaseHas('huidanalyses', [ 'body' => 'I exist :D' ]);

	}

	/** @test */
	function a_huidanalyse_requires_a_body ()
	{
		$customer = create(Customer::class);
		$huidanalyse = make(Huidanalyse::class, [ 'body' => null ]);

		$this->post($customer->path() . '/notities', $huidanalyse->toArray())
		     ->assertSessionHasErrors('body');
	}

	/** @test */
	public function authenticated_can_delete_a_huidanalyse_from_a_customer ()
	{
		$this->delete(route('huidanalyse.destroy',$this->huidanalyse));

		$this->assertDatabaseMissing('huidanalyses', [ 'id' => 1 ]);
		$this->assertDatabaseHas('huidanalyses', [ 'id' => 2 ]);
		$this->assertDatabaseHas('customers', [ 'id' => 1 ]);
	}

	/** @test */
	function an_authenticated_user_can_update_a_huidanalyse_of_a_customer ()
	{
		$huidanalyse = make(Huidanalyse::class, [
				'id'   => $this->huidanalyse->id,
				'body' => 'Cur historia congregabo?',
		]);
		$response = $this->put(route('huidanalyse.update', $this->huidanalyse), $huidanalyse->toArray());

		$this->get($response->headers->get('Location'))
		     ->assertSee('Cur historia congregabo?');

	}

	/** @test */
	function an_authenticated_user_can_edit_a_huidanalyse ()
	{
		$response = $this->get(route('huidanalyse.edit', [
				$this->customer,
				$this->huidanalyse->id,
		]));
		$response->assertStatus(200)
		         ->assertSee('Foo');
	}
}

