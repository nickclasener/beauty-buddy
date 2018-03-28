<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up ()
	{
		Schema::create('clients', function ( Blueprint $table ) {
			$table->increments('id');
			$table->string('naam');
			$table->string('slug');
			$table->string('email');
			$table->string('telefoon');
			$table->string('mobiel');
			$table->string('geboortedatum');
			$table->string('straatnaam');
			$table->string('huisnummer');
			$table->string('postcode');
			$table->string('plaats');
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
		Schema::dropIfExists('clients');
	}
}
