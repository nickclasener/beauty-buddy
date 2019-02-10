<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intake extends Model
{
	protected $guarded = [ 'id' ];

	public function customer ()
	{
		return $this->belongsTo(Customer::class);
	}
}
