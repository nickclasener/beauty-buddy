<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
	
	use Sluggable;
	
	/**
	 * @var array
	 */
	protected $guarded = [];
	
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
		return "/klanten/" . $this->slug;
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
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function intake()
	{
		return $this->hasOne(Intake::class);
  }

}
