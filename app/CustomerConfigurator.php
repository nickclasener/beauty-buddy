<?php

namespace App;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class CustomerConfigurator extends IndexConfigurator
{
	use Migratable;

	//	protected $defaultMapping = [
	//			'properties' => [
	//					'suggest' => [
	//							'type' => 'completion',
	//					],
	//					'naam'    => [ 'type' => 'keyword' ],
	//			],
	//	];
	protected $name = 'customers';
	/**
	 * @var array
	 */
	protected $settings = [
		//
	];
}
