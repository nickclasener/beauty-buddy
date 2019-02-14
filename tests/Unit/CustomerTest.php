<?php

namespace Tests\Unit;

use App\Customer;
use App\DailyAdvice;
use App\Huidanalyse;
use App\Intake;
use App\Note;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
	use RefreshDatabase;

	protected $customer;

	private   $dailyAdvice;

	public function setUp ()
	{
		parent::setUp();
		$this->customer = create(Customer::class, [
				'id'   => 1,
				'naam' => 'Jane Doe',
		]);
	}

	/** @test */
	function a_customer_has_a_path ()
	{
		$this->assertEquals("klanten/{$this->customer->slug}",
				$this->customer->path()
		);
	}

	/** @test */
	function a_customer_automatically_sets_the_slug_on_create ()
	{
		$this->assertEquals('jane-doe', $this->customer->slug);
	}

	/** @test */
	function a_customer_will_always_increment_a_slug_if_its_a_duplicate ()
	{
		create(Customer::class, [ 'naam' => 'Jane Doe' ]);
		$latestCustomer = create(Customer::class, [ 'naam' => 'Jane Doe' ]);

		$this->assertEquals('jane-doe-2', $latestCustomer->slug);

	}

	/** @test */
	function a_customer_has_a_creator ()
	{
		$this->assertInstanceOf(User::class, $this->customer->creator);
	}

	/** @test */
	function a_customer_has_a_path_to_notes ()
	{
		$this->assertEquals("klanten/{$this->customer->slug}/notities",
				$this->customer->pathNotes()
		);
	}

	/** @test */
	function a_customer_has_many_notes ()
	{
		$this->assertInstanceOf(Collection::class,
				$this->customer->notes);
	}

	/** @test */
	function a_customer_has_many_huidanalyses ()
	{
		$this->assertInstanceOf(Collection::class,
				$this->customer->huidanalyses);
	}

	/** @test */
	function a_customer_has_a_daily_advice ()
	{
		//		review :rogue code
		//		create(DailyAdvice::class, [ 'customer_id' => 1 ]);
		//		$this->assertInstanceOf(Model::class,
		$this->assertInstanceOf(Collection::class,
				$this->customer->dailyAdvices);
	}

	/** @test */
	function a_customer_has_a_intake ()
	{
		create(Intake::class, [ 'customer_id' => $this->customer->id ]);
		$this->assertInstanceOf(Model::class,
				$this->customer->intake);
	}

	/** @test */
	function a_user_can_add_a_note_to_a_customer ()
	{
		$this->customer->addNote([
				'body'    => 'FooBar',
				'user_id' => 1,
		]);

		$this->assertDatabaseHas('notes', [ 'body' => 'FooBar' ]);
		$this->assertCount(1, $this->customer->notes);
	}

	/** @test */
	function a_user_can_add_a_huidanalyse_to_a_customer ()
	{
		$this->customer->addHuidanalyse([
				'body'    => 'FooBar',
				'user_id' => 1,
		]);

		$this->assertDatabaseHas('huidanalyses', [ 'body' => 'FooBar' ]);
		$this->assertCount(1, $this->customer->huidanalyses);
	}

	/** @test */
	function a_customer_month_year_notes ()
	{
		$this->withoutExceptionHandling();
		create(Note::class, [
				'created_at'  => '2016-01-06 08:09:54',
				'customer_id' => 1,
		]);
		create(Note::class, [
				'created_at'  => '2016-01-06 08:09:54',
				'customer_id' => 1,
		]);
		create(Note::class, [
				'created_at'  => '2019-02-06 08:09:54',
				'customer_id' => 1,
		]);
		create(Note::class, [
				'created_at'  => '2019-03-06 08:09:54',
				'customer_id' => 1,
		]);
		create(Note::class, [
				'created_at'  => '2012-04-06 08:09:54',
				'customer_id' => 1,
		]);
		create(Note::class, [
				'created_at'  => '2012-04-06 08:09:54',
				'customer_id' => 1,
		]);

		$this->assertCount(4, $this->customer->monthYearNotes());
	}

	/** @test */
	function a_customer_month_year_huidanalyses ()
	{
		$this->withoutExceptionHandling();
		create(Huidanalyse::class, [
				'created_at'  => '2016-01-06 08:09:54',
				'customer_id' => 1,
		]);
		create(Huidanalyse::class, [
				'created_at'  => '2016-01-06 08:09:54',
				'customer_id' => 1,
		]);
		create(Huidanalyse::class, [
				'created_at'  => '2019-02-06 08:09:54',
				'customer_id' => 1,
		]);
		create(Huidanalyse::class, [
				'created_at'  => '2019-03-06 08:09:54',
				'customer_id' => 1,
		]);
		create(Huidanalyse::class, [
				'created_at'  => '2012-04-06 08:09:54',
				'customer_id' => 1,
		]);
		create(Huidanalyse::class, [
				'created_at'  => '2012-04-06 08:09:54',
				'customer_id' => 1,
		]);

		$this->assertCount(4, $this->customer->monthYearHuidanalyses());
	}

	/** @test */
	function a_customer_month_year_daily_advice ()
	{
		$this->withoutExceptionHandling();
		create(DailyAdvice::class, [
				'created_at'  => '2016-01-06 08:09:54',
				'customer_id' => 1,
		]);
		create(DailyAdvice::class, [
				'created_at'  => '2016-01-06 08:09:54',
				'customer_id' => 1,
		]);
		create(DailyAdvice::class, [
				'created_at'  => '2019-02-06 08:09:54',
				'customer_id' => 1,
		]);
		create(DailyAdvice::class, [
				'created_at'  => '2019-03-06 08:09:54',
				'customer_id' => 1,
		]);
		create(DailyAdvice::class, [
				'created_at'  => '2012-04-06 08:09:54',
				'customer_id' => 1,
		]);
		create(DailyAdvice::class, [
				'created_at'  => '2012-04-06 08:09:54',
				'customer_id' => 1,
		]);

		$this->assertCount(4, $this->customer->monthYearDailyAdvices());
	}

	//	review: Needed?
	//	/** @test */
	//	function a_user_can_update_the_daily_advice_off_a_customer ()
	//	{
	//		create(DailyAdvice::class, [
	//				'id'          => 1,
	//				'customer_id' => 1,
	//				'morning'     => 'Original Ochtend',
	//				'midday'      => 'Original Middag',
	//				'evening'     => 'Original Avond',
	//		]);
	//
	//		$this->assertDatabaseHas('daily_advices', [
	//				'id'          => 1,
	//				'customer_id' => 1,
	//				'morning'     => 'Original Ochtend',
	//				'midday'      => 'Original Middag',
	//				'evening'     => 'Original Avond',
	//		]);
	//		$dailyAdvice = [
	//				'id'          => 1,
	//				'customer_id' => 1,
	//				'morning'     => 'Updated Ochtend',
	//				'midday'      => 'Updated Middag',
	//				'evening'     => 'Updated Avond',
	//		];
	//		$this->customer->updateDailyAdvice($dailyAdvice);
	//		$this->assertDatabaseHas('daily_advices', [
	//				'id'          => 1,
	//				'customer_id' => 1,
	//				'morning'     => 'Updated Ochtend',
	//				'midday'      => 'Updated Middag',
	//				'evening'     => 'Updated Avond',
	//		]);
	//	}

	/** @test */
	function a_user_can_add_daily_advice_to_a_customer ()
	{
		$this->customer->addDailyAdvice([
				'user_id'     => 1,
				'customer_id' => 1,
				'morning'     => 'Original Ochtend',
				'midday'      => 'Original Middag',
				'evening'     => 'Original Avond',
		]);
		$this->assertDatabaseHas('daily_advices', [
				'user_id'     => 1,
				'customer_id' => 1,
				'morning'     => 'Original Ochtend',
				'midday'      => 'Original Middag',
				'evening'     => 'Original Avond',
		]);
	}

	/** @test */
	function a_user_cannot_add_multiple_daily_advices_to_a_customer ()
	{
		//		$this->expectException(QueryException::class);
		$this->customer->addDailyAdvice([
				'user_id'     => 1,
				'customer_id' => 1,
				'morning'     => 'Original Ochtend',
				'midday'      => 'Original Middag',
				'evening'     => 'Original Avond',
		]);
		$this->customer->addDailyAdvice([
				'user_id'     => 1,
				'customer_id' => 1,
				'morning'     => 'Second Ochtend',
				'midday'      => 'Second Middag',
				'evening'     => 'Second Avond',
		]);
		$this->assertDatabaseHas('daily_advices', [
				'customer_id' => 1,
				'morning'     => 'Original Ochtend',
				'midday'      => 'Original Middag',
				'evening'     => 'Original Avond',
		]);
		$this->assertDatabaseHas('daily_advices', [
				'customer_id' => 1,
				'morning'     => 'Second Ochtend',
				'midday'      => 'Second Middag',
				'evening'     => 'Second Avond',
		]);
	}

	/** @test */
	function a_user_can_delete_the_daily_advice_off_a_customer ()
	{
		create(DailyAdvice::class, [ 'customer_id' => 1 ]);

		$this->assertDatabaseHas('daily_advices', [ 'customer_id' => 1 ]);

		$this->customer->deleteDailyAdvice();

		$this->assertDatabaseMissing('daily_advices', [ 'customer_id' => 1 ]);
	}

	/** @test */
	function a_user_can_add_a_intake_to_a_customer ()
	{
		$this->customer->addIntake([
				'behandeling'     => 'FooBar',
				'huidverbetering' => 'FooBaz',
				'user_id'         => 1,
		]);
		$this->assertDatabaseHas('intakes', [
				'behandeling'     => 'FooBar',
				'huidverbetering' => 'FooBaz',
		]);
	}

	/** @test */
	function a_user_cannot_add_multiple_intakes_to_a_customer ()
	{
		$this->expectException(QueryException::class);
		$this->customer->addIntake([
				'customer_id'     => 1,
				'behandeling'     => 'FooBar',
				'huidverbetering' => 'FooBaz',
				'user_id'         => 1,
		]);
		$this->customer->addIntake([
				'customer_id'     => 1,
				'behandeling'     => 'FooBar2',
				'huidverbetering' => 'FooBaz2',
				'user_id'         => 1,
		]);
	}

	/** @test */
	function a_user_can_delete_a_intake_off_a_customer ()
	{
		create(Intake::class, [ 'customer_id' => 1 ]);

		$this->assertDatabaseHas('intakes', [ 'customer_id' => 1 ]);

		$this->customer->deleteIntake();

		$this->assertDatabaseMissing('intakes', [ 'customer_id' => 1 ]);
	}

	/** @test */
	function a_user_can_update_a_intake_off_a_customer ()
	{
		create(Intake::class, [
				'customer_id' => 1,
				'id'          => 1,
				'behandeling' => 'FooBar',
		]);

		$this->assertDatabaseHas('intakes', [
				'customer_id' => 1,
				'id'          => 1,
				'behandeling' => 'FooBar',
		]);
		$intake = [
				'customer_id' => 1,
				'id'          => 1,
				'behandeling' => 'FooBaz',
		];
		$this->customer->updateIntake($intake);
		$this->assertDatabaseHas('intakes', [
				'customer_id' => 1,
				'id'          => 1,
				'behandeling' => 'FooBaz',
		]);
	}
}
