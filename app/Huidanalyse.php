<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;

class Huidanalyse extends Model
{
	use Searchable;
	protected $guarded           = [];
	protected $indexConfigurator = HuidanalyseConfigurator::class;
	protected $mapping           = [
			'properties' => [
					'body'  => [
							'copy_to'         => 'body2',
							'type'            => 'text',
							'analyzer'        => 'autocomplete',
							'search_analyzer' => 'autocomplete_search',
							'fields'          => [
									'keyword' => [
											'type'         => 'keyword',
											'ignore_above' => 256,
									],
							],
					],
					'body2' => [
							'type'            => 'text',
							'analyzer'        => 'autocomplete',
							'search_analyzer' => 'autocomplete_search',
							'fields'          => [
									'keyword' => [
											'type'         => 'keyword',
											'ignore_above' => 256,
									],
							],
					],
			],
	];
	protected $searchRules       = [
			HuidanalyseRule::class,
	];
	protected $with              = [ 'creator' ];

	public function creator ()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function customer ()
	{
		return $this->belongsTo(Customer::class, 'customer_id');
	}
}
