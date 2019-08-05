<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Customer::class, static function ( Faker $faker ) {
	return [
			'user_id'       => static function () {
				return factory('App\User')->create()->id;
			},
			'naam'          => $faker->firstName . ' ' . $faker->lastName,
			'email'         => $faker->email,
			'telefoon'      => $faker->phoneNumber,
			'mobiel'        => $faker->phoneNumber,
			//			'geboortedatum' => $faker->date('d-m-Y'),
			'geboortedatum' => $faker->date,
			'straatnaam'    => $faker->streetName,
			'huisnummer'    => $faker->buildingNumber,
			'postcode'      => $faker->streetAddress,
			'plaats'        => $faker->city,
	];
});
