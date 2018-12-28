<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowedCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followed_categories', function (Blueprint $table) {
            $table->increments('followedCategoryID');

            $table->integer('userID')->unsigned();
            $table->foreign('userID')->references('userID')->on('users')->onDelete('cascade');

            $table->integer('categoryID')->unsigned();
            $table->foreign('categoryID')->references('categoryID')->on('categories')->onDelete('cascade');

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
        Schema::dropIfExists('followedCategories');
    }
}
