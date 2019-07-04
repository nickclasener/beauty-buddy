<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Huidanalyse::class, function ( Faker $faker ) {
	return [
			'customer_id' => function () {
				return factory('App\Customer')->create()->id;
			},
			'user_id'     => function () {
				return factory('App\User')->create()->id;
			},
			'body'        => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
			'created_at'  => $faker->dateTime,
	];
});
