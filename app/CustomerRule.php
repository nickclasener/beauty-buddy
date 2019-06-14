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
				'should' => [
						'match' => [
								'naam' => [
										'query'     => $this->builder->query,
										'analyzer'  => 'standard',
										'boost'     => 4,
										'fuzziness' => 'AUTO',
								],
						],
				],
		];
	}
}
