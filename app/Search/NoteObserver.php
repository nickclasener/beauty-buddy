<?php

namespace App\Search;

use App\Note;
use Elasticsearch\Client;

class NoteObserver
{
	private $elasticsearch;

	public function __construct ( Client $elasticsearch )
	{
		$this->elasticsearch = $elasticsearch;
	}

	public function saved ( Note $note )
	{
		$this->elasticsearch->index([
				'index' => $note->getSearchIndex(),
				'type'  => $note->getSearchType(),
				'id'    => $note->id,
				'body'  => $note->toSearchArray(),
		]);
	}

	public function updated ( Note $note )
	{
		$this->elasticsearch->update([
				'index' => $note->getSearchIndex(),
				'type'  => $note->getSearchType(),
				'id'    => $note->id,
				'body'  => [
						'doc' => $note->toSearchArray(),
				],
		]);
	}

	public function deleted ( Note $note )
	{
		$this->elasticsearch->delete([
				'index' => $note->getSearchIndex(),
				'type'  => $note->getSearchType(),
				'id'    => $note->id,
		]);
	}
}
