<?php

namespace App;

use ScoutElastic\SearchRule;

class DailyAdviceRule extends SearchRule
{
	public function buildHighlightPayload ()
	{
		return [
				'order'     => 'score',
				'pre_tags'  => [ '<strong>' ],
				'post_tags' => [ '</strong>' ],
				'fields'    => [
						[
								'morning' => [
										'type'                => 'unified',
										'require_field_match' => false,
								],
						],
						[
								'midday' => [
										'type'                => 'unified',
										'require_field_match' => false,
								],
						],
						[
								'evening' => [
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
								'multi_match' => [
										'query'    => $this->builder->query,
										'boost'    => 10,
										'operator' => 'AND',
										'fields'   => [
												'morning',
												'midday',
												'evening',
										],
								],
						],
						[
								'multi_match' => [
										'query'     => $this->builder->query,
										'fuzziness' => 2,
										'operator'  => 'AND',
										'fields'    => [
												'morning2',
												'midday2',
												'evening2',
										],
								],
						],
				],
		];
	}
}
