<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $table = 'rules';
    protected $fillable = [
        'user_id',
        'kategori_usia_id',
        'kategori_imt_id',
        'aktivitas_fisik_id',
        'sugar_categorie_id',
        'keterangan',
    ];

    public function ageCategory()
    {
        return $this->belongsTo(Usia::class, 'kategori_usia_id');
    }

    public function imtCategory()
    {
        return $this->belongsTo(Imt::class, 'kategori_imt_id');
    }

    public function activity()
    {
        return $this->belongsTo(AF::class, 'aktivitas_fisik_id');
    }

    public function sugarCategory()
    {
        return $this->belongsTo(GD::class, 'sugar_categorie_id');
    }

}
