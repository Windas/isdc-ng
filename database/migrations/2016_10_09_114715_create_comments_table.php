<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('commentor_id')->unsigned();
            $table->foreign('commentor_id')->references('id')->on('users');
            $table->integer('paragraph_id')->references('id')->on('paragraphs');
            $table->boolean('active')->default(true);
            $table->boolean('published')->default(true);
            $table->datetime('published_at');
            $table->integer('assent_count')->unsigned()->default(0);
            $table->integer('dissent_count')->unsigned()->default(0);
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
        Schema::dropIfExists('comments');
    }
}
