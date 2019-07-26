<?php


namespace Tests\Feature\Customer\Fields\Validations;


use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CustomerURLInstagramValidationsTest extends TestCase
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
            'url_instagram' => "https://www.instagram.com/simonnogueira/?hl=fr"
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
            'url_instagram' => "https://www.facebook.com/remy.lenglet.9"
        ]);
        $response->assertJsonValidationErrors(['url_instagram' => trans('user.fields.url_instagram.validations.regex')]);
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Re',
            'last_name' => 'Mo',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1',
            'url_instagram' => "https://admin.atomsit.com/register"
        ]);
        $response->assertJsonValidationErrors(['url_instagram' => trans('user.fields.url_instagram.validations.regex')]);
    }
}