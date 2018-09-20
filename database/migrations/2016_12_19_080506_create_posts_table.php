<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned()->default(0);
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('category_id')->nullable();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('short_content')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->datetime('posted_at');
            $table->boolean('published')->default(0);
            $table->float('p_rating')->default(0);
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
        Schema::drop('posts');
    }
}
