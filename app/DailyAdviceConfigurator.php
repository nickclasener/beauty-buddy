<?php

namespace App;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class DailyAdviceConfigurator extends IndexConfigurator
{
	use Migratable;

	protected $name     = 'daily_advices';
	protected $settings = [
			'analysis' => [
					'analyzer'  => [
							'autocomplete' => [
									'tokenizer' => 'autocomplete',
									'filter'    => [
											'lowercase',
									],
							],

							'autocomplete_search' => [
									'tokenizer' => 'lowercase',
							],
					],
					'tokenizer' => [
							'autocomplete' => [
									'type'        => 'edge_ngram',
									'min_gram'    => 1,
									'max_gram'    => 50,
									'token_chars' => [
											'letter',
									],
							],
					],
					'filter'    => [
							'autocomplete_filter' => [
									'type'        => 'edge_ngram',
									'min_gram'    => 1,
									'max_gram'    => 50,
									'token_chars' => [ 'letter' ],
							],
					],
			],
	];
}
