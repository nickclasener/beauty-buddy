<?php

namespace Tests\Feature;

use App\Customer;
use App\DailyAdvice;
use App\Huidanalyse;
use App\Intake;
use App\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeletingTest extends TestCase
{
	use RefreshDatabase;

	private $customer;
	private $dailyAdvice;
	private $huidanalyse;
	private $intake;
	private $note;

	public function setUp ()
	{
		parent::setUp();
		$this->signIn();

		$this->customer = create(Customer::class, [ 'id' => 1 ]);
		$this->note = create(Note::class, [ 'customer_id' => $this->customer->id ]);
		$this->huidanalyse = create(Huidanalyse::class, [ 'customer_id' => $this->customer->id ]);
		$this->dailyAdvice = create(DailyAdvice::class, [ 'customer_id' => $this->customer->id ]);
		$this->intake = create(Intake::class, [ 'customer_id' => $this->customer->id ]);
	}

	/** @test */
	public function authenticated_can_delete_a_customer ()
	{
		create(Customer::class);
		$this->delete($this->customer->path());

		$this->assertDatabaseMissing('customers', [ 'id' => $this->customer->id ]);
		$this->assertDatabaseHas('customers', [ 'id' => 2 ]);
	}

	/** @test */
	public function when_deleting_a_customer_all_related_records_are_deleted ()
	{
		create(Note::class, [ 'customer_id' => $this->customer->id ]);
		create(Huidanalyse::class, [ 'customer_id' => $this->customer->id ]);

		$this->delete(route('customer.destroy', $this->customer));

		$this->assertDatabaseMissing('customers', [ 'id' => 1 ]);
		$this->assertDatabaseMissing('notes', [ 'id' => 1 ]);
		$this->assertDatabaseMissing('notes', [ 'id' => 2 ]);
		$this->assertDatabaseMissing('huidanalyses', [ 'id' => 1 ]);
		$this->assertDatabaseMissing('huidanalyses', [ 'id' => 2 ]);
		$this->assertDatabaseMissing('daily_advices', [ 'id' => 1 ]);
		$this->assertDatabaseMissing('intakes', [ 'id' => 1 ]);
	}

	/** @test */
	public function authenticated_user_can_delete_a_note_from_a_customer ()
	{
		create(Note::class);
		$this->delete(route('note.destroy', $this->note));

		$this->assertDatabaseMissing('notes', [ 'id' => 1 ]);
		$this->assertDatabaseHas('notes', [ 'id' => 2 ]);
	}

	/** @test */
	public function authenticated_user_can_delete_a_huidanalyse_from_a_customer ()
	{
		create(Huidanalyse::class);
		$this->delete(route('huidanalyse.destroy', $this->huidanalyse));

		$this->assertDatabaseMissing('huidanalyses', [ 'id' => 1 ]);
		$this->assertDatabaseHas('huidanalyses', [ 'id' => 2 ]);
	}

	/** @test */
	public function authenticated_user_can_delete_a_intake_from_a_customer ()
	{
		$this->assertDatabaseHas('intakes', [
				'id' => $this->intake->id,
		]);
		$this->delete(route('intake.destroy', [
				$this->customer,
				$this->intake,
		]));
		$this->assertDatabaseMissing('intakes', [
				'id' => $this->intake->id,
		]);
	}
}
