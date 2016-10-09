<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('isdc小伙伴');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nick_name');
            $table->string('encrypted_password');
            $table->string('phone')->unique();
            $table->integer('sign_in_count')->unsigned()->default(0);
            $table->datetime('current_sign_in_at')->nullable();
            $table->datetime('last_sign_in_at')->nullable();
            $table->ipAddress('current_sign_in_ip')->nullable();
            $table->ipAddress('last_sign_in_ip')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('published')->default(true);
            $table->datetime('published_at');
            $table->integer('follow_count')->unsigned()->default(0);
            $table->text('description')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
