<?php

namespace App;

use ScoutElastic\SearchRule;

class CustomerRule extends SearchRule
{
	/**
	 * @inheritdoc
	 */
	public function buildHighlightPayload ()
	{
		//
	}

	/**
	 * @inheritdoc
	 */
	//
	public function buildQueryPayload ()
	{
		return [
			//				'query' => [
			'must'   => [
					'match' => [
							'naam' => [
									'query'     => $this->builder->query,
									//									'analyzer'  => 'autocomplete',
									'operator'  => 'AND',
									'fuzziness' => 'AUTO',
									//									'zero_terms_query' => 'all',
							],
					],
			],
			//						'filter' => [
			//								'term' => [
			//										'naam' => $this->builder->query,
			//										//														'analyzer' => 'autocomplete',
			//										//							'operator'  => 'AND',
			//										//							'fuzziness' => 'AUTO',
			//										//														'boost'     => 4,
			//								],
			//						],
			'should' => [
					'match' => [
							'naam' => [
									'query'     => $this->builder->query,
									//									'analyzer'  => 'autocomplete',
									//									'boost'     => 4,
									'fuzziness' => 'AUTO:1,1',
									'operator'  => 'AND',
							],
					],
			],
		];
	}
}
