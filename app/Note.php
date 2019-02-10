<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $guarded = [];
	protected $with    = [ 'creator' ];

	public function path ()
	{
		return $this->customer->path() . '/notities/' . $this->id;
	}

	public function basePath ()
	{
		return '/notities/' . $this->id;
	}

	public function creator ()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function customer ()
	{
		return $this->belongsTo(Customer::class);
	}
}
