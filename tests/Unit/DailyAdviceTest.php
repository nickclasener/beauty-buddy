<?php

namespace Tests\Unit;

use App\Customer;
use App\DailyAdvice;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DailyAdviceTest extends TestCase
{
	use RefreshDatabase;

	private $dailyAdvice;

	public function setUp ():void
{
		parent::setUp();

		create(Customer::class, [ 'id' => 1 ]);
		$this->dailyAdvice = create(DailyAdvice::class);
	}

	/** @test */
	function a_daily_advice_has_a_owner ()
	{
		$this->assertInstanceOf(User::class, $this->dailyAdvice->creator);
	}

	/** @test */
	function daily_advice_has_a_customer ()
	{
		$this->assertInstanceOf(Customer::class, $this->dailyAdvice->customer);
	}
}
