<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imt extends Model
{
    protected $table = 'imt_categories';
    protected $fillable = [
        'kategori_imt', 'rentan_imt', 'keterangan'
    ];
}
