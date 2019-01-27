<?php

namespace Tests\Unit;

use App\Customer;
use App\Intake;
use App\Note;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    protected $customer;

    public function setUp()
    {
        parent::setUp();
        $this->customer = create(Customer::class, ['id' => 1]);
    }

    /** @test */
    function a_customer_has_a_path()
    {
        $this->assertEquals("klanten/{$this->customer->slug}",
                $this->customer->path()
        );
    }

    /** @test */
    function a_customer_has_a_path_to_notes()
    {
        $this->assertEquals("klanten/{$this->customer->slug}/notities",
                $this->customer->pathNotes()
        );
    }

    /** @test */
    function a_customer_has_a_creator()
    {
        $this->assertInstanceOf(User::class, $this->customer->creator);
    }

    /** @test */
    function a_customer_has_many_notes()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',
                $this->customer->notes);
    }

    /** @test */
    function a_customer_has_many_huidanalyses()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',
                $this->customer->huidanalyses);
    }

    /** @test */
    function a_customer_has_a_intake()
    {
        create(Intake::class, ['customer_id' => $this->customer->id]);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Model',
                $this->customer->intake);
    }

    /** @test */
    function a_user_can_add_a_note_to_a_customer()
    {
        $this->customer->addNote([
                'body'    => 'FooBar',
                'user_id' => 1,
        ]);

        $this->assertDatabaseHas('notes', ['body' => 'FooBar']);
        $this->assertCount(1, $this->customer->notes);
    }

    /** @test */
    function a_customer_month_year_notes()
    {
        $this->withoutExceptionHandling();
        create(Note::class, [
                'created_at'  => '2016-01-06 08:09:54',
                'customer_id' => 1,
        ]);
        create(Note::class, [
                'created_at'  => '2016-01-06 08:09:54',
                'customer_id' => 1,
        ]);
        create(Note::class, [
                'created_at'  => '2019-02-06 08:09:54',
                'customer_id' => 1,
        ]);
        create(Note::class, [
                'created_at'  => '2019-03-06 08:09:54',
                'customer_id' => 1,
        ]);
        create(Note::class, [
                'created_at'  => '2012-04-06 08:09:54',
                'customer_id' => 1,
        ]);
        create(Note::class, [
                'created_at'  => '2012-04-06 08:09:54',
                'customer_id' => 1,
        ]);

        $this->assertCount(4, $this->customer->monthYearNotes());
    }

    /** @test */
    function a_user_can_add_a_intake_to_a_customer()
    {
        $this->customer->addIntake([
                'behandeling'     => 'FooBar',
                'huidverbetering' => 'FooBaz',
                'user_id'         => 1,
        ]);
        $this->assertDatabaseHas('intakes', [
                'behandeling'     => 'FooBar',
                'huidverbetering' => 'FooBaz',
        ]);
    }

    /** @test */
    function a_user_cannot_add_multiple_intakes_to_a_customer()
    {
        $this->expectException("Illuminate\Database\QueryException");
        $this->customer->addIntake([
                'customer_id'     => 1,
                'behandeling'     => 'FooBar',
                'huidverbetering' => 'FooBaz',
                'user_id'         => 1,
        ]);
        $this->customer->addIntake([
                'customer_id'     => 1,
                'behandeling'     => 'FooBar2',
                'huidverbetering' => 'FooBaz2',
                'user_id'         => 1,
        ]);
    }

    /** @test */
    function a_customer_automatically_sets_the_slug_on_create()
    {
        $customer = create(Customer::class, ['naam' => 'John Doe']);

        $this->assertEquals('john-doe', $customer->slug);
    }

    /** @test */
    function a_customer_will_always_increment_a_slug_if_its_a_duplicate()
    {
        create(Customer::class, ['naam' => 'John Doe']);
        create(Customer::class, ['naam' => 'John Doe']);
        $latestCustomer = create(Customer::class, ['naam' => 'John Doe']);

        $this->assertEquals('john-doe-2', $latestCustomer->slug);

    }

    /** @test */
    function a_user_can_delete_a_intake_off_a_customer()
    {
        create(Intake::class, ['customer_id' => 1]);

        $this->assertDatabaseHas('intakes', ['customer_id' => 1]);

        $this->customer->deleteIntake();

        $this->assertDatabaseMissing('intakes', ['customer_id' => 1]);
    }

    /** @test */
    function a_user_can_update_a_intake_off_a_customer()
    {
        create(Intake::class, [
                'customer_id' => 1,
                'id'          => 1,
                'behandeling' => 'FooBar',
        ]);

        $this->assertDatabaseHas('intakes', [
                'customer_id' => 1,
                'id'          => 1,
                'behandeling' => 'FooBar',
        ]);
        $intake = [
                'customer_id' => 1,
                'id'          => 1,
                'behandeling' => 'FooBaz',
        ];
        $this->customer->updateIntake($intake);
        $this->assertDatabaseHas('intakes', [
                'customer_id' => 1,
                'id'          => 1,
                'behandeling' => 'FooBaz',
        ]);
    }
}
