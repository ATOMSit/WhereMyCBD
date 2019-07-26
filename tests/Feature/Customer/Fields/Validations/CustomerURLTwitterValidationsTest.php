<?php


namespace Tests\Feature\Customer\Fields\Validations;


use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CustomerURLTwitterValidationsTest extends TestCase
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
    public function test_regex_valid()
    {
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Re',
            'last_name' => 'Mo',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1',
            'url_twitter' => "https://twitter.com/EmmanuelMacron?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"
        ]);
        $response->assertStatus(302);
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
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1',
            'url_twitter' => "https://www.facebook.com/remy.lenglet.9"
        ]);
        $response->assertJsonValidationErrors(['url_twitter' => trans('user.fields.url_twitter.validations.regex')]);
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Re',
            'last_name' => 'Mo',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1',
            'url_twitter' => "https://admin.atomsit.com/register"
        ]);
        $response->assertJsonValidationErrors(['url_twitter' => trans('user.fields.url_twitter.validations.regex')]);
    }
}