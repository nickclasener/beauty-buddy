<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntakesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('intakes', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('customer_id')->unique();
			$table->string('behandeling')->nullable();
			$table->string('huidverbetering')->nullable();
			$table->string('allergieen')->nullable();
			$table->string('bijzonderheden')->nullable();
			$table->string('bloeddruk')->nullable();
			$table->string('chemisch')->nullable();
			$table->string('cosmetisch')->nullable();
			$table->string('diabetes')->nullable();
			$table->string('eczeem')->nullable();
			$table->string('huidkanker')->nullable();
			$table->string('huidschimmel')->nullable();
			$table->string('ipl')->nullable();
			$table->string('kanker')->nullable();
			$table->boolean('bestraling')->nullable();
			$table->boolean('chemo')->nullable();
			$table->boolean('immunotherapie')->nullable();
			$table->string('laser')->nullable();
			$table->string('medicatie')->nullable();
			$table->string('operaties')->nullable();
			$table->string('zon')->nullable();
			$table->boolean('koortslip')->nullable();
			$table->boolean('roken')->nullable();
			$table->boolean('overgang')->nullable();
			$table->boolean('psoriasis')->nullable();
			$table->boolean('vitrigilo')->nullable();
			$table->boolean('zwanger')->nullable();
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
		Schema::dropIfExists('intakes');
	}
}
