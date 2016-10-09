<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('users');
            $table->string('title');
            $table->text('description');
            $table->boolean('active')->default(true);
            $table->boolean('published')->default(false);
            $table->datetime('published_at');
            $table->integer('view_count')->unsigned()->default(0);
            $table->integer('assent_count')->unsigned()->default(0);
            $table->integer('dissent_count')->unsigned()->default(0);
            $table->integer('transmit_count')->unsigned()->default(0);
            $table->integer('store_count')->unsigned()->default(0);
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
        Schema::dropIfExists('articles');
    }
}
