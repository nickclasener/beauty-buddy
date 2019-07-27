<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;

class DailyAdvice extends Model
{
	use Searchable;
	protected $guarded           = [];
	protected $indexConfigurator = DailyAdviceConfigurator::class;
	protected $mapping           = [
			'properties' => [
					'morning'  => [
							'copy_to'         => 'morning2',
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
					'morning2' => [
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
					'midday'   => [
							'copy_to'         => 'midday2',
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
					'midday2'  => [
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
					'evening'  => [
							'copy_to'         => 'evening2',
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
					'evening2' => [
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
			DailyAdviceRule::class,
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
