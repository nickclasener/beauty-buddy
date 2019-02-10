<?php

namespace Tests\Feature;

use App\Customer;
use App\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotesOfCustomerTest extends TestCase
{
	use RefreshDatabase;

	private $customer;
	private $note;

	public function setUp ()
	{
		parent::setUp();
		$this->signIn();
		$this->customer = create(Customer::class, [
				'id'   => 1,
				'naam' => 'john doe',
		]);
		$this->note = create(Note::class, [
				'id'          => 1,
				'customer_id' => 1,
				'body'        => 'Foo',
		]);

		create(Note::class, [
				'id'          => 2,
				'customer_id' => 1,
		]);
	}

	/** @test */
	function an_authenticated_user_can_add_a_note_to_a_customer ()
	{
		// Arrange
		$note = make(Note::class, [
				'customer_id' => 1,
				'id'          => 3,
				'body'        => 'I exist :D',
		]);
		// Act
		$this->post(route('notities.store', $this->customer), $note->toArray());

		$this->assertDatabaseHas('notes', [ 'body' => 'I exist :D' ]);

	}

	/** @test */
	function a_note_requires_a_body ()
	{
		$customer = create(Customer::class);
		$note = make(Note::class, [ 'body' => null ]);

		$this->post($customer->path() . '/notities', $note->toArray())
		     ->assertSessionHasErrors('body');
	}

	/** @test */
	public function authenticated_can_delete_a_note_from_a_customer ()
	{
		$this->delete($this->note->basePath());

		$this->assertDatabaseMissing('notes', [ 'id' => 1 ]);
		$this->assertDatabaseHas('notes', [ 'id' => 2 ]);
		$this->assertDatabaseHas('customers', [ 'id' => 1 ]);
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
		         ->assertSee('Foo');
	}
}

