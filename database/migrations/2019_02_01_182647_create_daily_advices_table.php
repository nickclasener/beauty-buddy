<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyAdvicesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up ()
	{
		Schema::create('daily_advices', function ( Blueprint $table ) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('customer_id');
			$table->text('morning')->nullable();
			$table->text('midday')->nullable();
			$table->text('evening')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down ()
	{
		Schema::dropIfExists('daily_advices');
	}
}
