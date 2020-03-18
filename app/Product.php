<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbl_produk';

    protected $fillable = [
    	"nama_produk",
    	"id_kategori",
    	"harga",
    	"stok",
    	"photo",
    	"deskripsi"
    ];
}
