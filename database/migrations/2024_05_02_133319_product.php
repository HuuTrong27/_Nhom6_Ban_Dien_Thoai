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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->decimal('price', 10, 2); // 10 digits in total, 2 after the decimal point
            $table->integer('discount')->nullable();
            $table->text('description')->nullable();
            $table->string('baohanh')->nullable();
            $table->boolean('new')->default(false);
            $table->boolean('trangthai')->default(true);
            $table->text('content')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('idcat'); // Foreign key to link with categories table
            $table->foreign('idcat')->references('id')->on('categories')->onDelete('cascade');
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
