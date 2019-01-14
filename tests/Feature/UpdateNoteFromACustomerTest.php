<?php

namespace Tests\Feature;

use App\Customer;
use App\Note;
use function dd;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function route;

class UpdateNoteFromACustomerTest extends TestCase
{
	use RefreshDatabase;
	
	public function setUp()
	{
		parent::setUp();
		$this->customer = create(Customer::class, ['id' => 1]);
		$this->note = create(Note::class, [
						'id'          => 1,
						'customer_id' => 1,
						'body'        => 'A falsis, parma teres poeta.',
						'date'        => '2-04-2018',
		]);
	}
	
	/** @test */
	function an_unauthenticated_user_cannnot_update_a_note_of_a_customer()
	{
		$this->withExceptionHandling();
		
		$this->get(route('notities.edit', [$this->customer, $this->note]))
						->assertRedirect('/login');
		
		$this->patch(route('notities.update', $this->note), $this->note->toArray())
						->assertRedirect('/login');
	}
	
	/** @test */
	function an_authenticated_user_can_update_a_note_of_a_customer()
	{
		$this->signIn()->withExceptionHandling();
		$note = make(Note::class, [
						'body' => 'Cur historia congregabo?',
						'date' => '20-12-1991',
		]);
		
		$response = $this->put($this->note->basePath(), $note->toArray());
//	dd($response);
		$this->get($response->headers->get('Location'))
						->assertSee('Cur historia congregabo?')
						->assertSee('20-12-1991');
		
	}
	
	/** @test */
	function an_authenticated_user_can_edit_a_note()
	{
		$this->signIn();
		$response = $this->get($this->note->path() . '/bewerken');
//		dd($response);
		$response->assertStatus(200)
						->assertSee('A falsis, parma teres poeta.')
						->assertSee('2-04-2018');
	}
}
