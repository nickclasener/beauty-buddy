<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	use Sluggable;
	protected $guarded = [ 'id' ];

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
		return $this->path() . 'notities';
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
		return $this->notes->sortByDesc('created_at')->groupBy(function ( $notes ) {
			return $notes->created_at->format('F, Y');
		});
	}

	public function huidanalyses ()
	{
		return $this->hasMany(Huidanalyse::class);
	}

	public function addNote ( $note )
	{
		return $this->notes()->create($note);
	}

	public function notes ()
	{
		return $this->hasMany(Note::class);
	}

	public function addIntake ( $intake )
	{
		return $this->intake()->create($intake);
	}

	public function intake ()
	{
		return $this->hasOne(Intake::class);
	}

	public function deleteIntake ()
	{
		return $this->intake()->delete();
	}

	public function updateIntake ( $intake )
	{
		return $this->intake()->update($intake);
	}

	protected static function boot ()
	{
		parent::boot();
		static::deleting(function ( $customer ) {
			$customer->notes()->delete();
		});
	}

	public function getRouteKeyName ()
	{
		return 'slug';
	}
}
