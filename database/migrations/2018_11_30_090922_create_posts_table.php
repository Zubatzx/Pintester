<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('postID');
            $table->string('title');
            $table->string('caption');
            $table->integer('price');
            $table->string('picture');

            $table->integer('userID')->unsigned();
            $table->foreign('userID')->references('userID')->on('users');

            $table->integer('categoryID')->unsigned();
            $table->foreign('categoryID')->references('categoryID')->on('categories');

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
        Schema::dropIfExists('posts');
    }
}
