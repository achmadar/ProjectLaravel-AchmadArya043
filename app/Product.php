<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;
	
    protected $table = 'tbl_produk';

    protected $fillable = [
        "nama_produk",
    	"id_kategori",
    	"harga",
    	"stok",
        "status",
    	"photo",
    	"deskripsi"
    ];
}
