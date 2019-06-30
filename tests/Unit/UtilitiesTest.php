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
		$this->get(route('customer.show', $this->customer));
		$this->assertEquals(' group hover:bg-teal-300  bg-teal-200 ', active_route_set_class('customer.show'));
		$this->assertEquals(' group hover:bg-teal-300  bg-teal-500 ', active_route_set_class('customer'));
	}

	/** @test */
	function active_icon_route_set_class ()
	{
		$this->get(route('customer.show', $this->customer));
		$this->assertEquals(' fill-current group-hover:text-teal-400 text-teal-500 ', active_icon_route_set_class('customer.show'));
		$this->assertEquals(' fill-current group-hover:text-teal-400 text-teal-200 ', active_icon_route_set_class('customer'));
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
	function monthYear ()
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
		$this->assertCount(2, monthYear($this->customer->notes));
	}

	/** @test */
	function monthYearDesc ()
	{
		$note1 = create(Note::class, [
				'id'          => 2,
				'customer_id' => 1,
				'body'        => 'note1',
				'created_at'  => '1991-12-22 08:09:54',
		]);
		$note2 = create(Note::class, [
				'id'          => 3,
				'customer_id' => 1,
				'body'        => 'note2',
				'created_at'  => '1991-12-21 08:09:54',
		]);
		$note3 = create(Note::class, [
				'id'          => 4,
				'customer_id' => 1,
				'body'        => 'note3',
				'created_at'  => '1990-12-22 08:09:54',
		]);
		$note4 = create(Note::class, [
				'id'          => 5,
				'customer_id' => 1,
				'body'        => 'note4',
				'created_at'  => '1990-12-21 08:09:54',
		]);
		$monthYearDesc = monthYearDesc($this->customer->notes);
		//		dd($monthYearDesc[ 'December, 1991' ][ 2 ]->body, $note1->body);
		$this->assertCount(2, monthYear($this->customer->notes));
		$this->assertEquals($note1->body, $monthYearDesc[ 'December, 1991' ][ 0 ]->body);
		$this->assertEquals($note2->body, $monthYearDesc[ 'December, 1991' ][ 1 ]->body);
		$this->assertEquals($note3->body, $monthYearDesc[ 'December, 1990' ][ 0 ]->body);
		$this->assertEquals($note4->body, $monthYearDesc[ 'December, 1990' ][ 1 ]->body);

	}

	/** @test */
	function month_year_of_a_note ()
	{
		$this->assertEquals('December, 1991', monthYearFormat($this->note));
	}
}
