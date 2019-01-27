<?php

namespace Tests\Feature;

use App\Customer;
use App\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewNotesTest extends TestCase
{
	use RefreshDatabase;

	public function setUp ()
	{
		parent::setUp();
		$this->signIn();
		$this->customer = create(Customer::class);
		$this->note = create(Note::class, [
				'customer_id' => $this->customer->id,
				'body'        => 'This is a note',
		]);

	}

	/** @test */
	function a_note_can_be_viewed ()
	{
		$this->get(route('notities.show', [ $this->customer, $this->note ]))
		     ->assertStatus(200)
		     ->assertSee('This is a note');
	}
}
