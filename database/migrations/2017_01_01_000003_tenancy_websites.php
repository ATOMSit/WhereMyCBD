<?php

/*
 * This file is part of the hyn/multi-tenant package.
 *
 * (c) Daniël Klabbers <daniel@klabbers.email>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://laravel-tenancy.com
 * @see https://github.com/hyn/multi-tenant
 */

use Hyn\Tenancy\Abstracts\AbstractMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TenancyWebsites extends AbstractMigration
{
    protected $system = true;

    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid');
            $table->string('name');
            $table->string('description')
                ->nullable();
            $table->string('managed_by_database_connection')
                ->nullable();
            $table->enum('offer', ['ecommerce', 'premium', 'blog']);
            $table->enum('status', ['active', 'inactive'])
                ->default('active');
            $table->enum('renewal', ['automatic', 'manual'])
                ->default('automatic');
            $table->timestamp('expires_on');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('websites');
    }
}
