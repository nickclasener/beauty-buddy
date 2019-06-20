<?php

namespace App;

use ScoutElastic\SearchRule;

class NoteRule extends SearchRule
{
	/**
	 * @inheritdoc
	 */
	public function buildHighlightPayload ()
	{
		return [
				'order'     => 'score',
				'pre_tags'  => [ '<strong>' ],
				'post_tags' => [ '</strong>' ],
				'fields'    => [
						[
								'body' =>
										[
												'require_field_match' => false,
												'type'                => 'unified',
										],
						],
				],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function buildQueryPayload ()
	{
		return [
				'must' => [
						[
								'match' => [
										'body' => [
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
