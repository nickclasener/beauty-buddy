<?php

namespace Tests\Unit;

use App\Client;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientTest extends TestCase
{
	use RefreshDatabase;

	protected $client;

	public function setUp ()
	{
		parent::setUp();
		$this->client = create(Client::class);
	}

	/** @test */
	function a_client_has_a_path ()
	{
		$this->assertEquals("/klanten/{$this->client->slug}",
			$this->client->path()
		);

	}

	/** @test */
	function a_client_has_a_dataPath ()
	{
		$this->assertEquals("/data/klanten/{$this->client->slug}",
			$this->client->dataPath()
		);

	}

	/** @test */
	function a_client_has_a_creator ()
	{
		$this->assertInstanceOf(User::class, $this->client->creator);
	}

	/** @test */
	function a_client_has_many_notes ()
	{
		$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->client->notes);
	}

}
