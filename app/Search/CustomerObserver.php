<?php

namespace App\Search;

use App\Customer;
use Elasticsearch\Client;

class CustomerObserver
{
	private $elasticsearch;
	
	public function __construct(Client $elasticsearch)
	{
		$this->elasticsearch = $elasticsearch;
	}
	
	public function saved(Customer $customer)
	{
		$this->elasticsearch->index([
						'index' => $customer->getSearchIndex(),
						'type'  => $customer->getSearchType(),
						'id'    => $customer->id,
						'body'  => $customer->toSearchArray(),
		]);
	}
	
	public function updated(Customer $customer)
	{
		$this->elasticsearch->update([
						'index' => $customer->getSearchIndex(),
						'type'  => $customer->getSearchType(),
						'id'    => $customer->id,
						'body'  => [
										'doc' => $customer->toSearchArray(),
						],
		]);
	}
	
	public function deleted(Customer $customer)
	{
		$this->elasticsearch->delete([
						'index' => $customer->getSearchIndex(),
						'type'  => $customer->getSearchType(),
						'id'    => $customer->id,
		]);
	}
}