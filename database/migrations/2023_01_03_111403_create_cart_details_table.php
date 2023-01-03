<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('usercredentials')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('itemdetails')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('transaction_id');
            $table->foreign('transaction_id')->references('transaction_id')->on('transactions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('quantity');
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
        Schema::dropIfExists('cart_details');
    }
}
