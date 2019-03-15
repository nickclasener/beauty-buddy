<?php

namespace Tests\Feature\Unit;

use App\Customer;
use App\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UtilitiesTest extends TestCase
{
	use RefreshDatabase;

	private $customer;
	private $note;

	public function setUp ()
	{
		parent::setUp();

		$this->note = create(Note::class, [
				'created_at'  => '1991-12-20 08:09:54',
				'customer_id' => 1,
		]);
		$this->customer = create(Customer::class, [
				'created_at' => '1991-12-20 08:09:54',
				'naam'       => 'jane doe',
		]);
	}

	/** @test */
	function day_number_month_three_letters ()
	{
		$this->assertEquals('20 Dec', dayMonth($this->note));
		$this->assertEquals('20 Dec', dayMonth($this->customer));
	}

	/** @test */
	function time_am_pm ()
	{
		$this->assertEquals('08:09am', timeAmPm($this->note));
		$this->assertEquals('08:09am', timeAmPm($this->customer));
	}

	/** @test */
	function active_route_set_class ()
	{
		$this->get(route('klanten.show', $this->customer));
		$this->assertEquals('active', active_route_set_class('klanten.show', 'active'));
		$this->assertEquals('inactive', active_route_set_class('klanten', 'active'));
	}

	/** @test */
	function checkbox ()
	{
		$booleanTrue = true;
		$booleanFalse = false;
		$this->assertEquals('checked', checkbox($booleanTrue));
		$this->assertEquals('', checkbox($booleanFalse));
	}

	/** @test */
	function monthYearDesc ()
	{
		create(Note::class, [
				'created_at'  => '1991-12-20 08:09:54',
				'customer_id' => 1,
		]);
		create(Note::class, [
				'created_at'  => '1991-12-20 08:09:54',
				'customer_id' => 1,
		]);
		create(Note::class, [
				'created_at'  => '1990-12-20 08:09:54',
				'customer_id' => 1,
		]);
		create(Note::class, [
				'created_at'  => '1990-12-20 08:09:54',
				'customer_id' => 1,
		]);

		$this->assertCount(2, monthYearDesc($this->customer->notes));

	}

	/** @test */
	function month_year_of_a_note ()
	{
		$this->assertEquals('December, 1991', monthYear($this->note));
	}
}
