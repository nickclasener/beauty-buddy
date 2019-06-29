<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
	use CreatesApplication;

	protected function signIn ( $user = null )
	{
		$user = $user ?: create(User::class);

		return $this->actingAs($user);

	}
}
