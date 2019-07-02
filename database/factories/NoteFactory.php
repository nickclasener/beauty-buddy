<?php

use Faker\Generator as Faker;

$factory->define(App\Note::class, static function ( Faker $faker ) {
	return [
			'customer_id' => static function () {
				return factory('App\Customer')->create()->id;
			},
			'user_id'     => static function () {
				return factory('App\User')->create()->id;
			},
			'body'        => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
			'created_at'  => $faker->dateTime,
	];
});

