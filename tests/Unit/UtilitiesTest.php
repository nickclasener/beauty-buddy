<?php

namespace Tests\Feature\Unit;

use App\Customer;
use App\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function create;
use function dayMonth;
use function dd;

class utilitiesTest extends TestCase
{
	use RefreshDatabase;
	
	public function setUp()
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
	function day_number_month_three_letters()
	{
		$this->assertEquals('20 Dec', dayMonth($this->note));
		$this->assertEquals('20 Dec', dayMonth($this->customer));
	}
	
	/** @test */
	function time_am_pm()
	{
		$this->assertEquals('08:09am', timeAmPm($this->note));
		$this->assertEquals('08:09am', timeAmPm($this->customer));
	}
	
	/** @test */
	function submenu_active()
	{
		$this->markTestSkipped();
		// TODO: I dont know how to test this one...
		if (! function_exists('set_active')) {
			function set_active($uri, $class)
			{
				return Request::is($uri) ? $class : '';
			}
		}
	}
}
