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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('verification_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('level')->default(1);
            $table->string('trangthai')->default('active');
            $table->string('loaitaikhoan')->default('basic');
            $table->string('diachi')->nullable();
            $table->string('dienthoai')->nullable();
            $table->rememberToken();
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->default(now());
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('level');
        });
    }
};
