<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usia extends Model
{
    protected $table = 'age_categories';
    protected $fillable = [
        'kelompok_usia', 'rentan_usia', 'keterangan'
    ];
}
