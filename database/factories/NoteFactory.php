<?php

use Faker\Generator as Faker;

$factory->define(App\Note::class, function ( Faker $faker ) {
	return [
		'client_id' => function () {
			return factory('App\Client')->create()->id;
		},
		'user_id'   => function () {
			return factory('App\User')->create()->id;
		},
		'body'      => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
	];
});
