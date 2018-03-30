<?php

namespace Tests\Feature;

use App\Client;
use App\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewClientsTest extends TestCase
{
	use RefreshDatabase;

	private $client;

	public function setUp ()
	{
		parent::setUp();
		$this->client = create(Client::class, [
			'naam'          => 'Jane Doe',
			'email'         => 'jane@doe.com',
			'telefoon'      => '0564894576',
			'mobiel'        => '0668598654',
			'geboortedatum' => '20-12-1991',
			'straatnaam'    => 'laralane',
			'huisnummer'    => '18',
			'postcode'      => '5896 AB',
			'plaats'        => 'Laraville',
		]);
	}

	/** @test */
	function a_user_can_view_a_client ()
	{
		// To make sure stimulus request’s the data
		$this->get($this->client->path())
			->assertStatus(200)
			->assertSee('data-content-loader-url="' . $this->client->dataPath());

		$this->get($this->client->dataPath())
			->assertStatus(200)
			->assertSee('Jane Doe')
			->assertSee('jane@doe.com')
			->assertSee('0564894576')
			->assertSee('0668598654')
			->assertSee('20-12-1991')
			->assertSee('laralane')
			->assertSee('18')
			->assertSee('5896 AB')
			->assertSee('Laraville');
	}

	/** @test */
	function a_user_can_view_multiple_clients ()
	{
		$this->get('klanten')
			->assertStatus(200)
			->assertSee('data-content-loader-url="/data/klanten"');

		$this->get('/data/klanten')
			->assertStatus(200)
			->assertSee($this->client->naam)
			->assertSee($this->client->email)
			->assertSee($this->client->telefoon)
			->assertSee($this->client->mobiel);

	}

	/** @test */
	function a_user_can_view_all_notes_of_a_client ()
	{
		create(Note::class, [
			'client_id' => $this->client->id,
			'body'      => 'This is body',
		], 2);

		$this->get($this->client->path())
			->assertStatus(200)
			->assertSee('data-content-loader-url="' . $this->client->dataPath());

		$this->get($this->client->dataPath())
			->assertStatus(200)
			->assertSee('This is body');
	}
}
