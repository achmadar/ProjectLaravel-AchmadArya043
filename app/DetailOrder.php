<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $table = 'tbl_detailorder';

    protected $fillable = [
        "nomor_pesanan",
    	"id_produk",
    	"jumlah_beli",
    	"subtotal"
    ];

}
