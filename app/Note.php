<?php

namespace App;

use App\Search\Searchable;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	use Searchable;
	
	protected $guarded = [];
	protected $with = ['creator'];
	
	protected static function boot()
	{
		parent::boot();
	}
	
	public function path()
	{
		return $this->customer->path() . '/notities/' . $this->id;
	}
	
	public function basePath()
	{
		return '/notities/' . $this->id;
	}
	
	public function creator()
	{
		return $this->belongsTo(User::class, 'user_id');
		
	}
	
	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}
}
