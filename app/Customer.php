<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;

class Customer extends Model
{
	use Sluggable;
	use Searchable;

	protected $guarded           = [ 'id' ];
	protected $indexConfigurator = CustomerConfigurator::class;
	protected $mapping           = [
			'properties' => [
					'naam'  => [
							'copy_to'         => 'naam2',
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
					'naam2' => [
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
			CustomerRule::class,
	];

	public function getRouteKeyName ()
	{
		return 'slug';
	}

	protected static function boot ()
	{
		parent::boot();
		static::deleting(static function ( $customer ) {
			$customer->notes()->delete();
			$customer->intake()->delete();
			$customer->huidanalyses()->delete();
			$customer->dailyAdvices()->delete();
		});
	}

	public function sluggable ()
	{
		return [
				'slug' => [
						'source' => 'naam',
				],
		];
	}

	public function pathNotes ()
	{
		return $this->path() . '/notities';
	}

	public function path ()
	{
		return 'klanten/' . $this->slug;
	}

	public function creator ()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function monthYearNotes ()
	{
		return monthYearDesc($this->notes);
	}

	public function addNote ( $note )
	{
		return $this->notes()->create($note);
	}

	public function notes ()
	{
		return $this->hasMany(Note::class);
	}

	public function monthYearHuidanalyses ()
	{
		return monthYearDesc($this->huidanalyses);
	}

	public function addHuidanalyse ( $huidanalyse )
	{
		return $this->huidanalyses()->create($huidanalyse);
	}

	public function huidanalyses ()
	{
		return $this->hasMany(Huidanalyse::class);
	}

	//	public function updateDailyAdvice ( $dailyAdvice )
	//	{
	//		return $this->dailyAdvices()->update($dailyAdvice);
	//	}

	public function monthYearDailyAdvices ()
	{
		return monthYearDesc($this->dailyAdvices);
	}

	public function addDailyAdvice ( $dailyAdvice )
	{
		return $this->dailyAdvices()->create($dailyAdvice);
	}

	public function dailyAdvices ()
	{
		return $this->hasMany(DailyAdvice::class);
	}

	public function deleteDailyAdvice ()
	{
		return $this->dailyAdvices()->delete();
	}

	public function deleteIntake ()
	{
		return $this->intake()->delete();
	}

	public function intake ()
	{
		return $this->hasOne(Intake::class);
	}

	public function addIntake ( $intake )
	{
		return $this->intake()->create($intake);
	}

	public function updateIntake ( $intake )
	{
		return $this->intake()->update($intake);
	}
}
