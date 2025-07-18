<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AF extends Model
{
    protected $table = 'activitys';
    protected $fillable = [
        'kategori',  'keterangan'
    ];
}
