<?php

namespace App\Repository;

use App\Customer;
use Elasticsearch\Client;
use stdClass;

class CustomersElasticsearchRepository implements CustomersRepository
{
	private $search;

	public function __construct ( Client $client )
	{
		$this->search = $client;
	}

	public function search ( $query = '' )
	{
		$items = $this->searchOnElasticsearch($query);

		return $this->buildCollection($items);
	}

	private function searchOnElasticsearch ( $query )
	{
		$instance = new Customer;

		$params = [
				'size'  => 100,
				'index' => $instance->getSearchIndex(),
				'type'  => '_doc',
				'body'  => [
						'sort'      => [
								new stdClass([ 'naam' => [ 'order' => 'desc' ] ])

								//								//								'_score',
						],
						'highlight' => [
								'fields' => [
										'naam' => new stdClass(),
								],
						],
						'query'     => [
								'bool' => [
										'must'   => [
												'match_all' => new stdClass(),
										],
										//										'filter' => [
										//												[ 'naam' => $query ],
										//										],
										'should' => [
												[
														'span_term' => [
															//																											],
															//													'match' => [
															'naam' => [
																	'query'     => $query,
																	'boost'     => 3,
																	'fuzziness' => 'AUTO:1,1',
															],
														],
												],
										],
								]
								//								'multi_match' => [
								//										'fields'         => [
								//												'naam',
								//										],
								//										'query'          => $query,
								//										//										'sort'           => 'naam:asc',
								//										'fuzziness'      => 'AUTO:1,1',
								//										'max_expansions' => 100,
								//										//										'sort'           => [
								//										//												[ 'naam' => [ 'order' => 'desc' ] ],
								//										//										],
								//								],
						],
				],
		];
		//		dd($params);
		$items = $this->search->search($params);

		return $items;
	}

	private function buildCollection ( $items )
	{
		$hits = array_pluck($items[ 'hits' ][ 'hits' ], '_source') ?: [];
		$hits2 = array_pluck($items[ 'hits' ][ 'hits' ], 'highlight') ?: [];
		$sources = array_map(static function ( $source, $source2 ) {
			$source[ 'naam' ] = $source2[ 'naam' ][ 0 ] ?: $source[ 'naam' ];

			return $source;
		}, $hits, $hits2);

		return Customer::hydrate($sources);
	}
}
