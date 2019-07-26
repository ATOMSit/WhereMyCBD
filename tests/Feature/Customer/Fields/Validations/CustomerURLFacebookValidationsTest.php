<?php

namespace Tests\Feature\Customer\Fields\Validations;

use App\Customer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CustomerURLFacebookValidationsTest extends TestCase
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
            'url_facebook' => "https://www.facebook.com/ATOMSit/"
        ]);
        $response->assertStatus(302);
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Re',
            'last_name' => 'Mo',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1',
            'url_facebook' => "https://www.facebook.com/remy.lenglet.9"
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
            'url_facebook' => "https://www.linkedin.com/in/r%C3%A9my-lenglet-78080017a/"
        ]);
        $response->assertJsonValidationErrors(['url_facebook' => trans('user.fields.url_facebook.validations.regex')]);
        $response = $this->postJson(route('admin.register_store'), [
            'first_name' => 'Re',
            'last_name' => 'Mo',
            'email' => str_random(5) . '@atomsit.com',
            'password' => 'verystrongPASSWORD1',
            'password_confirmation' => 'verystrongPASSWORD1',
            'url_facebook' => "https://admin.atomsit.com/register"
        ]);
        $response->assertJsonValidationErrors(['url_facebook' => trans('user.fields.url_facebook.validations.regex')]);
    }
}