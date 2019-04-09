<?php

namespace Tests\Feature;

use App\Customer;
use App\Intake;
use App\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UnauthenticatedUserCantTest extends TestCase
{
	use RefreshDatabase;
	private $customer;
	private $intake;
	private $note;

	public function setUp ()
	{
		parent::setUp();
		$this->customer = create(Customer::class);
		$this->note = create(Note::class);
		$this->intake = create(Intake::class);
	}

	/** @test */
	function an_unauthenticated_user_cannot_add_customer ()
	{
		$this->get('/klanten/create')
		     ->assertRedirect('/login');
		$this->post('/klanten')
		     ->assertRedirect('/login');
	}

	/** @test */
	public function an_unauthenticated_user_cannot_update_a_customer ()
	{
		$this->get($this->customer->path() . '/bewerken')
		     ->assertRedirect('/login');

		$this->patch($this->customer->path(), $this->customer->toArray())
		     ->assertRedirect('/login');
	}

	/** @test */
	function an_unauthenticated_user_cannot_add_notes ()
	{
		$this->post('/klanten/john-doe/notities')
		     ->assertRedirect('/login');
	}

	/** @test */
	function an_unauthenticated_user_cannot_update_a_note_of_a_customer ()
	{
		$this->get(route('notes.edit', [
				$this->customer,
				$this->note,
		]))
		     ->assertRedirect('/login');

		$this->patch(route('notes.update', $this->note), $this->note->toArray())
		     ->assertRedirect('/login');
	}

	/** @test */
	function an_unauthenticated_user_cannot_delete_a_note_from_a_customer ()
	{
		$this->delete(route('notes.destroy', $this->note))
		     ->assertRedirect('/login');
	}

	/** @test */
	function an_unauthenticated_user_cannot_add_a_intake_to_a_customer ()
	{
		$this->get(route('intake.create', $this->customer))
		     ->assertRedirect('login');
		$this->post(route('intake.store', $this->customer))
		     ->assertRedirect('login');
	}

	/** @test */
	function an_unauthenticated_user_cannot_update_a_intake_of_a_customer ()
	{
		$this->get(route('intake.edit', [
				$this->customer,
				$this->intake,
		]))
		     ->assertRedirect('login');
		$this->patch(route('intake.update', [
				$this->customer,
				$this->intake,
		]), $this->intake->toArray())
		     ->assertRedirect('login');
	}
}
