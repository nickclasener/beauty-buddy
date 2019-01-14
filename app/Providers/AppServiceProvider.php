<?php

namespace App\Providers;

use App\Customer;
use App\Note;
use App\Search\CustomerObserver;
use App\Search\NoteObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
//		Customer::observe(CustomerObserver::class);
//		Note::observe(NoteObserver::class);
	}
	
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
//		$this->app->singleton(CustomersRepository::class, function ($app) {
//			return new CustomersElasticsearchRepository($app->make(Client::class));
//		});
//		$this->app->singleton(NotesRepository::class, function ($app) {
//			return new NotesElasticsearchRepository($app->make(Client::class));
//		});
//		$this->bindSearchClient();
	}
	
//	private function bindSearchClient()
//	{
//		$this->app->bind(Client::class, function ($app) {
//			return ClientBuilder::create()
//							->setHosts(config('services.search.hosts'))
//							->build();
//		});
//	}
}
