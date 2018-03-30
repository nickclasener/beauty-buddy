<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $guarded = [];

	public function creator ()
	{
		return $this->belongsTo(User::class, 'user_id');

	}

	public function client ()
	{
		return $this->belongsTo(Client::class);
	}
}
