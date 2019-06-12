<?php

namespace App\Providers;

use App\Customer;
use App\Note;
use App\Repository\CustomersElasticsearchRepository;
use App\Repository\CustomersRepository;
use App\Repository\NotesElasticsearchRepository;
use App\Repository\NotesRepository;
use App\Search\CustomerObserver;
use App\Search\NoteObserver;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot ()
	{
		Customer::observe(CustomerObserver::class);
		Note::observe(NoteObserver::class);
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register ()
	{
		$this->app->singleton(CustomersRepository::class, static function ( $app ) {
			return new CustomersElasticsearchRepository($app->make(Client::class));
		});
		$this->app->singleton(NotesRepository::class, static function ( $app ) {
			return new NotesElasticsearchRepository($app->make(Client::class));
		});
		$this->bindSearchClient();
	}

	private function bindSearchClient ()
	{
		$this->app->bind(Client::class, static function ( $app ) {
			return ClientBuilder::create()
			                    ->setHosts(config('services.search.hosts'))
			                    ->build();
		});
	}
}
