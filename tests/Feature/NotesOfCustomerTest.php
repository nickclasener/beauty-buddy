<?php

namespace Tests\Feature;

use App\Customer;
use App\Note;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotesOfCustomerTest extends TestCase
{
	use RefreshDatabase;

	private $customer;
	private $note;

	public function setUp ()
	:void
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
				'user_id'     => 1,
				'body'        => 'Foo',
				'created_at'  => Carbon::tomorrow(),
		]);

		create(Note::class, [
				'id'          => 2,
				'customer_id' => 1,
				'user_id'     => 1,
				'created_at'  => Carbon::yesterday(),
		]);
	}

	/** @test */
	function an_authenticated_user_can_add_a_note_to_a_customer_via_json ()
	{

		// Arrange
		$note = make(Note::class, [
				'id'          => 3,
				'customer_id' => 1,
				'user_id'     => 1,
				'body'        => 'I exist ajax :D',
		]);
		// Act
		//		TODO: create the ajax stimulus js tests
		//		$this->json('post', route('note.store', $this->customer), $note->toArray())->assertExactJson($note);
		$this->json('post', route('note.store', $this->customer), $note->toArray());

		$this->assertDatabaseHas('notes', [ 'body' => 'I exist ajax :D' ]);
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
		$this->post(route('note.store', $this->customer), $note->toArray());

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
		$this->delete(route('note.destroy', $this->note));

		$this->assertDatabaseMissing('notes', [ 'id' => 1 ]);
		$this->assertDatabaseHas('notes', [ 'id' => 2 ]);
		$this->assertDatabaseHas('customers', [ 'id' => 1 ]);
	}

	/** @test */
	function an_authenticated_user_can_update_a_note_of_a_customer ()
	{
		$note = make(Note::class, [
				'id'   => $this->note->id,
				'body' => 'Updated Note',
		]);
		$response = $this->put(route('note.update', $this->note), $note->toArray());

		$this->get($response->headers->get('Location'))
		     ->assertSee('Updated Note');

	}

	/** @test */
	function an_authenticated_user_can_edit_a_note ()
	{
		$response = $this->get(route('note.edit', [
				$this->customer,
				$this->note->id,
		]));
		$response->assertStatus(200)
		         ->assertSee('Foo');
	}
}

