<?php

use Faker\Generator as Faker;

$factory->define(App\Intake::class, function ( Faker $faker ) {
	return [
		'customer_id'       => function () {
			return factory('App\Customer')->create()->id;
		},
		'user_id'         => function () {
			return factory('App\User')->create()->id;
		},
		'behandeling'     => $faker->sentence,
		'huidverbetering' => $faker->sentence,
		'allergieen'      => $faker->sentence,
		'bijzonderheden'  => $faker->sentence,
		'bloeddruk'       => $faker->sentence,
		'chemisch'        => $faker->sentence,
		'cosmetisch'      => $faker->sentence,
		'diabetes'        => $faker->sentence,
		'eczeem'          => $faker->sentence,
		'huidkanker'      => $faker->sentence,
		'huidschimmel'    => $faker->sentence,
		'ipl'             => $faker->sentence,
		'kanker'          => $faker->sentence,
		'bestraling'      => $faker->boolean,
		'chemo'           => $faker->boolean,
		'immunotherapi'   => $faker->boolean,
		'laser'           => $faker->sentence,
		'medicatie'       => $faker->sentence,
		'operaties'       => $faker->sentence,
		'zon'             => $faker->sentence,
		'koortslip'       => $faker->boolean,
		'roken'           => $faker->boolean,
		'overgang'        => $faker->boolean,
		'psoriasis'       => $faker->boolean,
		'vitrigilo'       => $faker->boolean,
		'zwanger'         => $faker->boolean,
	];
});
