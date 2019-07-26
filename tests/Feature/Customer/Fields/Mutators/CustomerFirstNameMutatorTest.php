<?php

namespace Tests\Feature;

use App\Customer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CustomerFirstNameMutatorTest extends TestCase
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
    public function test_capitalize_valid()
    {
        $email = 'withaccent@atomsit.com';
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'eemy',
            'last_name' => 'Mé',
            'email' => $email,
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $customer = Customer::query()->where('email', $email)->firstOrFail();
        $this->assertEquals('Eemy', $customer->first_name);
    }

    /**
     * Test to prevent the insertion of a required field.
     * Valid
     *
     * @return void
     */
    public function test_capitalize_with_accent_valid()
    {
        $email = 'withaccent@atomsit.com';
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'éemy',
            'last_name' => 'Mé',
            'email' => $email,
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $customer = Customer::query()->where('email', $email)->firstOrFail();
        $this->assertEquals('Éemy', $customer->first_name);
    }

    /**
     * Test to prevent the insertion of a required field.
     * Valid
     *
     * @return void
     */
    public function test_trimduplicatespaces_valid()
    {
        $email = 'withaccent@atomsit.com';
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Me  bonjour',
            'last_name' => 'Me  bonjour',
            'email' => $email,
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $customer = Customer::query()->where('email', $email)->firstOrFail();
        $this->assertEquals(10, strlen($customer->first_name));
    }

    /**
     * Test to prevent the insertion of a required field.
     * Valid
     *
     * @return void
     */
    public function test_removelastspaces_valid()
    {
        $email = 'withaccent@atomsit.com';
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'eemy ',
            'last_name' => 'Mé',
            'email' => $email,
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $customer = Customer::query()->where('email', $email)->firstOrFail();
        $this->assertEquals(4, strlen($customer->first_name));
        $email = 'withaccent@atomsit.com';
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'eemy  ',
            'last_name' => 'Mé',
            'email' => $email,
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $customer = Customer::query()->where('email', $email)->firstOrFail();
        $this->assertEquals(4, strlen($customer->first_name));
    }
}