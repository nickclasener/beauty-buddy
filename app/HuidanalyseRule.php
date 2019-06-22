<?php

namespace App;

use ScoutElastic\SearchRule;

class HuidanalyseRule extends SearchRule
{
	public function buildHighlightPayload ()
	{
		return [
				'order'     => 'score',
				'pre_tags'  => [ '<strong>' ],
				'post_tags' => [ '</strong>' ],
				'fields'    => [
						[
								'body' => [
										'type'                => 'unified',
										'require_field_match' => false,
								],
						],
				],
		];
	}

	public function buildQueryPayload ()
	{
		return [
				'must' => [
						[
								'match' => [
										'body' => [
												'query'    => $this->builder->query,
												'boost'    => 10,
												'operator' => 'AND',
										],
								],
						],
						[
								'match' => [
										'body2' => [
												'query'     => $this->builder->query,
												'fuzziness' => 2,
												'operator'  => 'AND',
										],
								],
						],
				],
		];
	}
}
