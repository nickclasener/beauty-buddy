<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	use Sluggable;

	protected $guarded = [];

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
		return "klanten/" . $this->slug;
	}

	public function dataPath ()
	{
		return "data/klanten/" . $this->slug;
	}
}
