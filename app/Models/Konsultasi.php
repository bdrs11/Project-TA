<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $table = 'consultations';
    protected $fillable = [
        'usia',  
        'berat_badan',
        'tinggi_badan',
        'aktivitas_fisik',
        'kadar_gula',
        'detail_id'
    ];

    // Relasi ke detail rekomendasi
    public function detailRecommendation()
    {
        return $this->belongsTo(DetailRekomendasi::class, 'detail_id');
    }

    // Optional: untuk akses cepat makanan dari konsultasi
    public function food()
    {
        return $this->hasOneThrough(Food::class, DetailRekomendasi::class, 'id', 'id', 'detail_id', 'food_id');
    }
}
