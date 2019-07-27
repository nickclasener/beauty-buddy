<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\DailyAdvice::class, function ( Faker $faker ) {
	return [
			'customer_id' => function () {
				return factory('App\Customer')->create()->id;
			},
			'user_id'     => function () {
				return factory('App\User')->create()->id;
			},
			'morning'     => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
			'midday'      => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
			'evening'     => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
			'created_at'  => $faker->dateTime,
	];
});
