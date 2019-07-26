<?php

namespace Tests\Feature\Customer\Fields\Validations;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CustomerDescriptionValidationsTest extends TestCase
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
    public function test_nullable_valid()
    {
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Remy',
            'last_name' => 'Mo',
            'description' => null,
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertStatus(302);
    }

    /**
     * Test to prevent insertion because the field is too small.
     * Valid
     *
     * @return void
     */
    public function test_min_valid()
    {
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Re',
            'last_name' => 'Mo',
            'description' => $this->generateRandomString(20),
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertStatus(302);
    }

    /**
     * Test to prevent insertion because the field is too small.
     * NoValid
     *
     * @return void
     */
    public function test_min_novalid()
    {
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Re',
            'last_name' => 'Me',
            'description' => $this->generateRandomString(19),
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertJsonValidationErrors(['description' => trans('user.fields.description.validations.min')]);
    }

    /**
     * Test to prevent insertion because the field is too great.
     * NoValid
     *
     * @return void
     */
    public function test_max_valid()
    {
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => $this->generateRandomString(100),
            'last_name' => $this->generateRandomString(100),
            'description' => $this->generateRandomString(500),
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertStatus(302);
    }

    /**
     * Test to prevent insertion because the field is too great.
     * NoValid
     *
     * @return void
     */
    public function test_max_novalid()
    {
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => $this->generateRandomString(101),
            'last_name' => $this->generateRandomString(100),
            'description' => $this->generateRandomString(501),
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertJsonValidationErrors(['description' => trans('user.fields.description.validations.max')]);
    }
}