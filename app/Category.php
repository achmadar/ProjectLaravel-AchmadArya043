<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;
	
    protected $table = 'tbl_kategori';

    protected $fillable = [
        "nama_kategori",
        "status"
    ];
}
