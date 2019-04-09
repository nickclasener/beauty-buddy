<?php

namespace Tests\Unit;

use App\Customer;
use App\Note;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NoteTest extends TestCase
{
	use RefreshDatabase;

	private $customer;
	private $note;

	public function setUp ()
	{
		parent::setUp();

		$this->customer = create(Customer::class);
		$this->note = create(Note::class, [ 'customer_id' => $this->customer->id ]);
	}

	/** @test */
	function a_note_has_a_owner ()
	{
		$this->assertInstanceOf(User::class, $this->note->creator);
	}

	/** @test */
	function a_note_belongs_to_a_customer ()
	{
		$this->assertInstanceOf(Customer::class, $this->note->customer);
	}
}
