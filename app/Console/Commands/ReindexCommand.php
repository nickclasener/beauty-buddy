<?php

namespace App\Console\Commands;

use App\Customer;
use Elasticsearch\Client;
use Illuminate\Console\Command;

class ReindexCommand extends Command
{
	
	protected $name = "search:reindex";
	
	protected $description = "Indexes all Models to elasticsearch";
	
	private $search;
	
	public function __construct(Client $search)
	{
		parent::__construct();
		
		$this->search = $search;
	}
	
	public function handle()
	{
		$this->info('Indexing all Models. Might take a while...');
		
		foreach (Customer::cursor() as $model) {
			$this->search->index([
							'index' => $model->getSearchIndex(),
							'type'  => $model->getSearchType(),
							'id'    => $model->id,
							'body'  => $model->toSearchArray(),
			]);
			// PHPUnit-style feedback
			$this->output->write('.');
		}
		
		$this->info("\nDone!");
	}
}