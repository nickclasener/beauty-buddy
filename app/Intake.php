<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intake extends Model
{
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function customer ()
	{
		return $this->belongsTo(Customer::class);
	}
}
