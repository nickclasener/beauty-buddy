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

	private $note;

	public function setUp ()
	{
		parent::setUp();

		create(Customer::class, [ 'id' => 1 ]);
		$this->note = create(Note::class);
	}

	/** @test */
	function a_note_has_a_path ()
	{
		$this->assertEquals("klanten/{$this->note->customer->slug}/notities/{$this->note->id}",
				$this->note->path()
		);
	}

	/** @test */
	function a_note_has_a_basePath ()
	{
		$this->assertEquals("/notities/{$this->note->id}",
				$this->note->basePath()
		);
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
