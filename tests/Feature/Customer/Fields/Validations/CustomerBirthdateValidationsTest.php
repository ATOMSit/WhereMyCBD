<?php

namespace Tests\Feature\Customer\Fields\Validations;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CustomerBirthdateValidationsTest extends TestCase
{
    use DatabaseMigrations {
        runDatabaseMigrations as baseRunDatabaseMigrations;
    }

    /**
     * Define hooks to migrate the database before and after each test.
     *
     * @return void
     */
    public function runDatabaseMigrations()
    {
        $this->baseRunDatabaseMigrations();
        $this->artisan('db:seed');
    }


    /**
     * Test to prevent the insertion of a required field.
     * Valid
     *
     * @return void
     */
    public function test_date_valid()
    {

        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Re',
            'last_name' => 'Mo',
            'birthdate' => '25-12-2018',
            'description' => $this->generateRandomString(20),
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertStatus(302);
    }

    /**
     * Test to prevent the insertion of a required field.
     * NoValid
     *
     * @return void
     */
    public function test_date_novalid()
    {
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Re',
            'last_name' => 'Mo',
            'birthdate' => '25/12585/2018',
            'description' => $this->generateRandomString(20),
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertJsonValidationErrors(['birthdate' => trans('user.fields.birthdate.validations.date')]);
    }
}