<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function ( Faker $faker ) {
	return [
		'naam'          => $faker->name,
		'email'         => $faker->email,
		'telefoon'      => $faker->phoneNumber,
		'mobiel'        => $faker->phoneNumber,
		'geboortedatum' => $faker->date('d-m-Y'),
		'straatnaam'    => $faker->streetName,
		'huisnummer'    => $faker->buildingNumber,
		'postcode'      => $faker->streetAddress,
		'plaats'        => $faker->city,
	];
});
