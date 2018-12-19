<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_comments', function (Blueprint $table) {
            $table->increments('detailCommentID');
            $table->string('comment');

            $table->integer('userID')->unsigned();
            $table->foreign('userID')->references('userID')->on('users');

            $table->integer('postID')->unsigned();
            $table->foreign('postID')->references('postID')->on('posts');

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
        Schema::dropIfExists('detailComments');
    }
}
