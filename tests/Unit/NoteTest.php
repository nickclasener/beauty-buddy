<?php

namespace Tests\Unit;

use App\Client;
use App\Note;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function create;

class NoteTest extends TestCase
{
	use RefreshDatabase;

	protected $client;

	public function setUp ()
	{
		parent::setUp();
		$this->note = create(Note::class);

	}

	/** @test */
	function a_note_has_a_owner ()
	{

		$this->assertInstanceOf(User::class, $this->note->creator);
	}

	/** @test */
	function a_note_belongs_to_a_client ()
	{
		$this->assertInstanceOf(Client::class, $this->note->client);
	}
}
