<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyAdvice extends Model
{
	protected $guarded = [];
	protected $with    = [ 'creator' ];

	public function creator ()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function customer ()
	{
		return $this->belongsTo(Customer::class);
	}
}
