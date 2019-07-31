<?php

namespace App\Console\Commands;

use App\Customer;
use App\DailyAdvice;
use App\Huidanalyse;
use App\Intake;
use App\Note;
use App\User;
use Illuminate\Console\Command;

class ExampleAccountData extends Command
{
	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create example account';
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'example';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct ()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle ()
	{
		factory(Customer::class)
				->create([
						'id'      => 1,
						'user_id' => 1,
				]);
		factory(Customer::class)
				->create([
						'id'      => 2,
						'user_id' => 1,
				]);
		factory(Note::class, 40)
				->create([
						'user_id'     => 1,
						'customer_id' => 1,
				]);
		//		factory(Huidanalyse::class, 40)
		//				->create([
		//						'user_id'     => 1,
		//						'customer_id' => 1,
		//				]);
		factory(DailyAdvice::class, 40)
				->create([
						'user_id'     => 1,
						'customer_id' => 1,
				]);
		factory(Intake::class)
				->create([
						'user_id'     => 1,
						'customer_id' => 2,
				]);

	}
}
