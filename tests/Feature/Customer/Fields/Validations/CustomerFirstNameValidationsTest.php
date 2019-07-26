<?php

namespace Tests\Feature\Customer\Fields\Validations;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CustomerFirstNameValidationsTest extends TestCase
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
            'first_name' => 'Remy',
            'last_name' => 'Mo',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertStatus(302);
    }

    /**
     * Test to prevent the insertion of a required field
     * NoValid
     *
     * @return void
     */
    public function test_required_novalid()
    {
        $response = $this->postJson(route('admin.register_store'), [
            'last_name' => 'Remy',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertJsonValidationErrors(['first_name' => trans('user.fields.first_name.validations.required')]);
    }

    /**
     * Test to find out if the field is in the right format.
     * Valid
     *
     * @return void
     */
    public function test_regex_valid()
    {
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Remy',
            'last_name' => 'Lenglet',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertStatus(302);
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Lenglet-Bonjour',
            'last_name' => 'Lenglet-Bonjour',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertStatus(302);
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Lenglet Bonjour',
            'last_name' => 'Lenglet bonjour',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertStatus(302);
    }

    /**
     * Test to find out if the field is in the right format.
     * NoValid
     *
     * @return void
     */
    public function test_regex_novalid()
    {
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Lenglet*',
            'last_name' => 'Lenglet',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertJsonValidationErrors(['first_name' => trans('user.fields.first_name.validations.regex')]);
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Lenglet.',
            'last_name' => 'Lenglet',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertJsonValidationErrors(['first_name' => trans('user.fields.first_name.validations.regex')]);
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => '123',
            'last_name' => 'lenglet',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertJsonValidationErrors(['first_name' => trans('user.fields.first_name.validations.regex')]);
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
            'first_name' => 'R',
            'last_name' => 'Me',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertJsonValidationErrors(['first_name' => trans('user.fields.first_name.validations.min')]);
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
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $response->assertJsonValidationErrors(['first_name' => trans('user.fields.first_name.validations.max')]);
    }
}