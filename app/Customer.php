<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	use Sluggable;

	protected $guarded = [];

	/**
	 * @return array
	 */
	public function sluggable ()
	{
		return [
			'slug' => [
				'source' => 'naam',
			],
		];
	}

	public function getRouteKeyName ()
	{
		return 'slug';
	}

	public function path ()
	{
		return "/klanten/" . $this->slug;
	}

	public function dataPath ()
	{
		return "/data/klanten/" . $this->slug;
	}

	public function creator ()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function notes ()
	{
		return $this->hasMany(Note::class);
	}

	public function intake ()
	{
		return $this->hasOne(Intake::class);
	}

}
