<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->mediumText('description')
                ->nullable();
            $table->date('birthdate')
                ->nullable();
            $table->string('email')
                ->unique();
            $table->timestamp('email_verified_at')
                ->nullable();
            $table->string('password');
            $table->string('url_facebook')
                ->nullable();
            $table->string('url_instagram')
                ->nullable();
            $table->string('url_twitter')
                ->nullable();
            $table->string('url_linkedin')
                ->nullable();
            $table->string('url_website')
                ->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('websites', function (Blueprint $table) {
            $table->bigInteger('customer_id')
                ->unsigned()
                ->after('id');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');
        });
        Schema::table('hostnames', function (Blueprint $table) {
            $table->bigInteger('customer_id')
                ->unsigned()
                ->after('id');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
        Schema::table('websites', function (Blueprint $table) {
            $table->dropColumn('customer_id');
        });
        Schema::table('hostnames', function (Blueprint $table) {
            $table->dropColumn('customer_id');
        });
    }
}
