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
		return [
				'order'     => 'score',
				'pre_tags'  => [ '<strong>' ],
				'post_tags' => [ '</strong>' ],
				'fields'    => [
						[
								'naam' =>
										[
												'require_field_match' => false,
												'type'                => 'unified',
										],
						],
						//						[
						//								'naam2' =>
						//										[
						//											//								//							'term_vector'         => 'with_positions_offsets',
						//											//								//								'force_source'        => true,
						//											//											'matched_fields' => [
						//											//													'naam',
						//											//													//										//																					'naam.plain',
						//											//											],
						//											'require_field_match' => false,
						//											'type'                => 'plain',
						//										],
						//						],
				],
		];
	}

	/**
	 * @inheritdoc
	 */
	//
	public function buildQueryPayload ()
	{
		return [
				'must'   => [
						[
								'match' => [
										'naam3' => [
												'query'     => $this->builder->query,
												'fuzziness' => 2,
												'operator'  => 'AND',
										],
								],
						],
				],
				'should' => [
						[
								'match' => [
										'naam3' => [
												'query'     => $this->builder->query,
												'fuzziness' => 2,
												'operator'  => 'AND',
										],
								],
						],
						[
								'match' => [
										'naam2' => [
												'query'     => $this->builder->query,
												'fuzziness' => 1,
												'boost'     => 2,
												'operator'  => 'AND',
										],
								],
						],
				],
		];
	}
}
