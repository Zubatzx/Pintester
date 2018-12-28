<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_carts', function (Blueprint $table) {
            $table->increments('detailCartID');

            $table->integer('cartID')->unsigned();
            $table->foreign('cartID')->references('cartID')->on('carts')->onDelete('cascade');

            $table->integer('postID')->unsigned();
            $table->foreign('postID')->references('postID')->on('posts')->onDelete('cascade');

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
        Schema::dropIfExists('detailCarts');
    }
}
