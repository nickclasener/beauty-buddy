<?php

namespace Tests\Feature;

use App\Customer;
use App\Intake;
use App\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function create;

/**
 * @property mixed customer
 * @property mixed note
 */
class DeletingACustomerTest extends TestCase
{
	use RefreshDatabase;
	
	public function setUp()
	{
		parent::setUp();
		
		$this->customer = create(Customer::class, ['id' => 1]);
		$this->note = create(Note::class, ['customer_id' => 1]);
		$this->intake = create(Intake::class, ['customer_id' => 1]);
	}
	
	/** @test */
	public function authenticated_can_delete_a_customer()
	{
		create(Customer::class);
		
		$this->signIn()->delete($this->customer->path());
		
		$this->assertDatabaseMissing('customers', ['id' => 1]);
		$this->assertDatabaseHas('customers', ['id' => 2]);
	}
	
	/** @test */
	public function authenticated_user_can_delete_a_note_from_a_customer()
	{
		create(Note::class);
		
		$this->signIn()->delete($this->note->basePath());
		
		$this->assertDatabaseMissing('notes', ['id' => 1]);
		$this->assertDatabaseHas('notes', ['id' => 2]);
	}
	
	/** @test */
	public function authenticated_can_delete_the_notes_of_a_customer()
	{
		create(Note::class, ['customer_id' => 1]);
		create(Note::class, ['customer_id' => 1]);
		
		$this->signIn()->delete($this->customer->path());
		
		$this->assertDatabaseMissing('customers', ['id' => 1]);
		$this->assertDatabaseMissing('notes', ['id' => 1]);
		$this->assertDatabaseMissing('notes', ['id' => 2]);
		$this->assertDatabaseMissing('notes', ['id' => 3]);
	}
	
	/** @test */
	public function authenticated_user_can_delete_a_intake_from_a_customer()
	{
		$customer = create(Customer::class, ['id' => 2]);
		$intake = create(Intake::class, ['customer_id' => 2]);
		
		$this->signIn();
		
		$this->assertDatabaseHas('intakes', ['id' => $intake->id, 'customer_id' => 2]);
		
		$this->delete(route('intake.destroy', [$customer, $intake]));
		$this->assertDatabaseMissing('intakes', ['id' => $intake->id, 'customer_id' => 2]);
	}
}
