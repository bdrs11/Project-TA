<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GD extends Model
{
    protected $table = 'sugar_categories';
    protected $fillable = [
        'kategori', 'rentan', 'keterangan'
    ];
}
