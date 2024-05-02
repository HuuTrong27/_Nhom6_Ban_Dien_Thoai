<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bill_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bill');
            $table->unsignedBigInteger('id_products');
            $table->integer('quantity');
            $table->string('image')->nullable();
            $table->decimal('price', 10, 2);
            $table->timestamps();
            $table->foreign('id_bill')->references('id')->on('bills')->onDelete('cascade');
            $table->foreign('id_products')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
