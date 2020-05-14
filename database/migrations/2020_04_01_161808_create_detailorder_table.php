<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_detailorder', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor_pesanan');
            $table->unsignedBigInteger('id_produk');
            $table->bigInteger('jumlah_beli');
            $table->bigInteger('subtotal');
            $table->timestamps();
            $table->foreign('id_produk')->references('id')->on('tbl_produk');
        });

        DB::unprepared('CREATE TRIGGER update_stok AFTER INSERT ON `tbl_detailorder` FOR EACH ROW
            BEGIN 

            UPDATE tbl_produk SET stok=stok-NEW.jumlah_beli 
            WHERE id=NEW.id_produk;

            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_detailorder');
        DB::unprepared('DROP TRIGGER `update_stok`');
    }
}
