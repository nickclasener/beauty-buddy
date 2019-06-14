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
			'analysis' => [
					'filter'   => [
							'autocomplete_filter' => [
									'type'     => 'edge_ngram',
									'min_gram' => 1,
									'max_gram' => 50,
							],
					],
					'analyzer' => [
							'autocomplete' => [
									'type'      => 'custom',
									'tokenizer' => 'standard',
									'filter'    => [
											'lowercase',
											'autocomplete_filter',
									],
							],
					],
			],
	];
}
