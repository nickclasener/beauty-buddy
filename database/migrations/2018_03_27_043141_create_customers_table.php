<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id'); // add a company id
			$table->integer('intake_id')->nullable();
			$table->string('naam');
			$table->string('slug')->unique();
			$table->string('straatnaam')->nullable();
			$table->string('huisnummer')->nullable();
			$table->string('postcode')->nullable();
			$table->string('plaats')->nullable();
			$table->string('telefoon')->nullable();
			$table->string('mobiel')->nullable();
			$table->string('email')->nullable();
			$table->date('geboortedatum')->nullable();
			$table->timestamps();
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('customers');
	}
}
