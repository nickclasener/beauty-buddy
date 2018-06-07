<?php

namespace App\Repository;

use App\Customer;
use Elasticsearch\Client;

class CustomersElasticsearchRepository implements CustomersRepository
{
	
	private $search;
	
	public function __construct(Client $client)
	{
		$this->search = $client;
	}
	
	public function search($query = "")
	{
		$items = $this->searchOnElasticsearch($query);
		
		return $this->buildCollection($items);
	}
	
	private function searchOnElasticsearch($query)
	{
		$instance = new Customer;
		$items = $this->search->search([
						"size"  => 100,
						'index' => $instance->getSearchIndex(),
						'type'  => '_doc',
						'body'  => [
										'query' => [
														'multi_match' => [
																		'fields'         => ['naam', 'email'],
																		'query'          => $query,
																		'fuzziness'      => 'AUTO',
																		'max_expansions' => 100,
														],
										],
						],
		]);
		
		return $items;
	}
	
	private function buildCollection($items)
	{
		$hits = array_pluck($items['hits']['hits'], '_source') ?: [];
		$sources = array_map(function ($source) {
			return $source;
		}, $hits);
		
		return Customer::hydrate($sources);
	}
}