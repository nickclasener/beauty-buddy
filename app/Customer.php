<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
//	use Searchable;
	use Sluggable;
	
	/**
	 * @var array
	 */
	protected $guarded = ['id'];
	
	protected static function boot()
	{
		parent::boot();
		static::deleting(function ($customer) {
			$customer->notes()->delete();
		});
	}
	
	/**
	 * @return array
	 */
	public function sluggable()
	{
		return [
						'slug' => [
										'source' => 'naam',
						],
		];
	}
	
	/**
	 * @return string
	 */
	public function getRouteKeyName()
	{
		return 'slug';
	}
	
	/**
	 * @return string
	 */
	public function path()
	{
		return "klanten/" . $this->slug;
	}
	
	public function pathNotes()
	{
		return $this->path() . "/notities";
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function creator()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function notes()
	{
		return $this->hasMany(Note::class);
	}
	
	public function monthYearNotes()
	{
		return $this->notes->sortByDesc('created_at')->groupBy(function ($notes) {
			return $notes->created_at->format('F, Y');
		});
	}
	
	public function huidanalyses()
	{
		return $this->hasMany(Huidanalyse::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function intake()
	{
		return $this->hasOne(Intake::class);
	}
	
	public function addNote($note)
	{
		return $this->notes()->create($note);
	}
	
	public function addIntake($intake)
	{
		return $this->intake()->create($intake);
	}
	
	public function deleteIntake()
	{
		return $this->intake()->delete();
	}
	
	public function updateIntake($intake)
	{
		return $this->intake()->update($intake);
	}
}

