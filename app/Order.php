<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
	use SoftDeletes;
    
    protected $table = 'tbl_order';

    protected $fillable = [
        "nomor_pesanan",
    	"id_users",
    	"pembeli",
    	"total_harga",
    	"bayar",
    	"kembali"
    ];

}
