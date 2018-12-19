<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_histories', function (Blueprint $table) {
            $table->increments('detailHistoryID');

            $table->integer('historyID')->unsigned();
            $table->foreign('historyID')->references('historyID')->on('histories');

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
        Schema::dropIfExists('detailHistories');
    }
}
