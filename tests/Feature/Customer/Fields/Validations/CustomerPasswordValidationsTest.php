<?php

namespace Tests\Feature\Customer\Fields\Validations;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CustomerPasswordValidationsTest extends TestCase
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
    public function test_required_valid()
    {
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Re',
            'last_name' => 'Mo',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertStatus(302);
    }

    /**
     * Test to prevent the insertion of a required field.
     * Valid
     *
     * @return void
     */
    public function test_required_novalid()
    {
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Re',
            'last_name' => 'Mo',
            'email' => str_random(5) . '@atomsit.com',
            'password_confirmation'=>'password_confirmation'
        ]);
        $response->assertJsonValidationErrors(['password' => trans('user.fields.password.validations.required')]);
    }

    /**
     * Test to prevent the insertion of a required field.
     * Valid
     *
     * @return void
     */
    public function test_min_valid()
    {
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Re',
            'last_name' => 'Mo',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertStatus(302);
    }

    /**
     * Test to prevent the insertion of a required field.
     * Valid
     *
     * @return void
     */
    public function test_min_novalid()
    {
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Re',
            'last_name' => 'Mo',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'vE6re',
            'password_confirmation' => 'vE6re'
        ]);
        $response->assertJsonValidationErrors(['password' => trans('user.fields.password.validations.min')]);
    }

    /**
     * Test to prevent the insertion of a required field.
     * Valid
     *
     * @return void
     */
    public function test_regex_novalid()
    {
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Re',
            'last_name' => 'Mo',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verrrereyred',
            'password_confirmation' => 'verrrereyred'
        ]);
        $response->assertJsonValidationErrors(['password' => trans('user.fields.password.validations.regex')]);

        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Re',
            'last_name' => 'Mo',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'AEREREASZDZ',
            'password_confirmation' => 'AEREREASZDZ'
        ]);
        $response->assertJsonValidationErrors(['password' => trans('user.fields.password.validations.regex')]);

        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Re',
            'last_name' => 'Mo',
            'email' => str_random(5) . '@atomsit.com',
            'password' => '125422515158',
            'password_confirmation' => '125422515158'
        ]);
        $response->assertJsonValidationErrors(['password' => trans('user.fields.password.validations.regex')]);
    }
}