<?php

namespace Tests\Feature;

use App\Customer;
use App\Intake;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function route;

class CreateAIntakeForACustomerTest extends TestCase
{
	use RefreshDatabase;
	
	/** @test */
	function a_unauthenticated_user_may_not_add_a_intake_to_a_customer()
	{
		$this->withExceptionHandling();
		
		$customer = create(Customer::class, ['id' => 1]);
		$this->get(route('intake.create', $customer))
						->assertRedirect('login');
		$this->post(route('intake.store', $customer))
						->assertRedirect('login');
	}
	
	/** @test */
	function a_authenticated_user_can_add_a_intake_to_a_customer()
	{
		$this->signIn()->withoutExceptionHandling();
		$customer = create(Customer::class, ['id' => 1]);
		$intake = make(Intake::class, ['customer_id' => 1]);
		
		$response = $this->post($customer->path() . '/intake', $intake->toArray());
//		dd($response);
		$this->get($response->headers->get('Location'))
						->assertSee($intake->behandeling)
						->assertSee($intake->huidverbetering)
						->assertSee($intake->allergieen)
						->assertSee($intake->bijzonderheden)
						->assertSee($intake->bloeddruk)
						->assertSee($intake->chemisch)
						->assertSee($intake->cosmetisch)
						->assertSee($intake->diabetes)
						->assertSee($intake->eczeem)
						->assertSee($intake->huidkanker)
						->assertSee($intake->huidschimmel)
						->assertSee($intake->ipl)
						->assertSee($intake->kanker)
						->assertSee($intake->bestraling)
						->assertSee($intake->chemo)
						->assertSee($intake->immunotherapie)
						->assertSee($intake->laser)
						->assertSee($intake->medicatie)
						->assertSee($intake->operaties)
						->assertSee($intake->zon)
						->assertSee($intake->koortslip)
						->assertSee($intake->roken)
						->assertSee($intake->overgang)
						->assertSee($intake->psoriasis)
						->assertSee($intake->vitrigilo)
						->assertSee($intake->zwanger);
	}
}
