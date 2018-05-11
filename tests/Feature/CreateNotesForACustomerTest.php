<?php

namespace Tests\Feature;

use App\Customer;
use App\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateNotesForACustomerTest extends TestCase
{
	use RefreshDatabase;
	
	public function setUp()
	{
		parent::setUp();
		
		create(Customer::class, ['id' => 1, 'naam' => 'john doe']);
		$this->note = create(Note::class, [
						'id'          => 1,
						'customer_id' => 1,
						'body'        => 'Foo',
		]);
		
		create(Note::class, ['id' => 2, 'customer_id' => 1]);
	}
	
	/** @test */
	function an_unauthenticated_user_may_not_add_notes()
	{
		$this->post('/klanten/john-doe/notities', [])
						->assertRedirect('/login');
	}
	
	/** @test */
	function an_authenticated_user_can_add_a_note_to_a_customer()
	{
		// Arrange
		$this->withExceptionHandling()->signIn();
		$customer = create(Customer::class);
		$note = make(Note::class, [
						'body' => 'I exist :D',
						'date' => '24-12-2018',
		]);
		// Act
		$this->json('post', $customer->path() . '/notities', $note->toArray());
		// Assert
		$this->get($customer->path())
						->assertSee('I exist :D')
						->assertSee('24-12-2018');
	}
	
	/** @test */
	function a_note_requires_a_body()
	{
		$this->withExceptionHandling()->signIn();
		
		$customer = create(Customer::class);
		$note = make(Note::class, ['body' => null]);
		
		$this->json('POST', $customer->path() . '/notities', $note->toArray())
						->assertJsonValidationErrors('body');
	}
	
	/** @test */
	function a_customer_birthday_is_a_date_format()
	{
		$this->withExceptionHandling()->signIn();
		$customer = create(Customer::class);
		$note = make(Note::class, ['date' => 'string']);
		
		$this->json('POST', $customer->path() . '/notities', $note->toArray())
						->assertJsonValidationErrors('date');
	}
	
	/** @test */
	function a_unauthenticated_cannot_delete_a_note_from_a_customer()
	{
		$this->withExceptionHandling();
		
		$note = create(Note::class);
		$this->delete($note->basePath())->assertRedirect('/login');
		
	}
	
	/** @test */
	public function authenticated_can_delete_a_note_from_a_customer()
	{
		$this->signIn();
		$response = $this->delete($this->note->basePath());
		
		$response->assertStatus(302);
		
		$this->assertDatabaseMissing('notes', ['id' => 1]);
		$this->assertDatabaseHas('notes', ['id' => 2]);
		$this->assertDatabaseHas('customers', ['id' => 1]);
	}
}

