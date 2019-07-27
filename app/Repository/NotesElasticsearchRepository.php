<?php

namespace App\Repository;

use App\Note;
use Elasticsearch\Client;

class NotesElasticsearchRepository implements NotesRepository
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
		$instance = new Note;
		$items = $this->search->search([
				'size'  => 100,
				'index' => $instance->getSearchIndex(),
				'type'  => '_doc',
				'body'  => [
						'query' => [
								'multi_match' => [
										'fields'         => [ 'body' ],
										'query'          => $query,
										'fuzziness'      => 'AUTO',
										'max_expansions' => 100,
								],
						],
				],
		]);

		return $items;
	}

	private function buildCollection ( $items )
	{
		$hits = array_pluck($items[ 'hits' ][ 'hits' ], '_source') ?: [];
		$sources = array_map(static function ( $source ) {
			return $source;
		}, $hits);

		return Note::hydrate($sources);
	}
}