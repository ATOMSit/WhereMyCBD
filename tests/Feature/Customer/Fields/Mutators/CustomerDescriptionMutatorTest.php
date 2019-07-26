<?php


namespace Tests\Feature\Customer\Fields\Mutators;


use App\Customer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CustomerDescriptionMutatorTest extends TestCase
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
    public function test_trimduplicatespaces_valid()
    {
        $email = 'withaccent@atomsit.com';
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Me  bonjour',
            'last_name' => 'Me  bonjour',
            'description' => 'bonjour je suis sur le point de developper une  application',
            'email' => $email,
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $customer = Customer::query()->where('email', $email)->firstOrFail();
        $this->assertEquals(58, strlen($customer->description));
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
            'description' => 'bonjour je suis sur le point de developper une  application ',
            'email' => $email,
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $customer = Customer::query()->where('email', $email)->firstOrFail();
        $this->assertEquals(58, strlen($customer->description));
        $email = 'withaccent@atomsit.com';
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'eemy  ',
            'last_name' => 'Mé',
            'description' => 'bonjour je suis sur le point de developper une  application  ',
            'email' => $email,
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1'
        ]);
        $customer = Customer::query()->where('email', $email)->firstOrFail();
        $this->assertEquals(58, strlen($customer->description));
    }
}