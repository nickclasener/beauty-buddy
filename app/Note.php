<?php

namespace App;

use App\Search\Searchable;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	use Searchable;
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
