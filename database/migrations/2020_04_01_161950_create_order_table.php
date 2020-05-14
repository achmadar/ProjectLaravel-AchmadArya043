<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor_pesanan');
            $table->unsignedBigInteger('id_users');
            $table->string('pembeli');
            $table->bigInteger('total_harga');
            $table->bigInteger('bayar');
            $table->bigInteger('kembali');
            $table->timestamps();
            $table->foreign('id_users')->references('id')->on('users');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_order');
    }
}
