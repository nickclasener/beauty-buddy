<?php

namespace App\Providers;

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
		//		Customer::observe(CustomerObserver::class);
		//		Note::observe(NoteObserver::class);
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register ()
	{
		//		$this->app->singleton(CustomersRepository::class, static function ( $app ) {
		//			return new CustomersElasticsearchRepository($app->make(Client::class));
		//		});
		//		$this->app->singleton(NotesRepository::class, function ($app) {
		//			return new NotesElasticsearchRepository($app->make(Client::class));
		//		});
		//		dd($this->bindSearchClient());
	}

//	private function bindSearchClient ()
	//	{
	//		$this->app->bind(Client::class, static function ( $app ) {
	//			return ClientBuilder::create()
	//			                    ->setHosts(config('services.search.hosts'))
	//			                    ->build();
	//		});
	//	}
}
