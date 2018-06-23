<?php

namespace App\Search;

trait Searchable
{
//		// This makes it easy to toggle the search feature flag
//		// on and off. This is going to prove useful later on
//		// when deploy the new search engine to a live app .
//		if (config('services.search.enabled')) {
//		}
	
	public function getSearchIndex()
	{
		return $this->getTable();
	}
	
	public function getSearchType()
	{
//		return $this->getKeyType();
		return '_doc';
//		return 'doc';
	}
	
	public function toSearchArray()
	{
		// By having a custom method that transforms the model
		// to a searchable array allows us to customize the
		// data that's going to be searchable per model.
		return $this->toArray();
	}
}
