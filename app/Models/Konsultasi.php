<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $table = 'consultations';
    protected $fillable = [
        'user_id',
        'usia',  
        'berat_badan',
        'tinggi_badan',
        'aktivitas_fisik',
        'kadar_gula',
        'rule_id',
        'detail_id',
        'recommendation_id'
    ];

    // Relasi ke detail rekomendasi
    public function detail()
    {
        return $this->belongsTo(DetailRekomendasi::class, 'detail_id');
    }

    public function recommendation()
    {
        return $this->belongsTo(Recommend::class, 'recommendation_id');
    }

    // Optional: untuk akses cepat makanan dari konsultasi
    public function food()
    {
        return $this->hasOneThrough(Food::class, DetailRekomendasi::class, 'id', 'id', 'detail_id', 'food_id');
    }

    public function usiaKategori()
    {
        return $this->belongsTo(Usia::class, 'usia');
    }

    public function aktivitas()
    {
        return $this->belongsTo(AF::class, 'aktivitas_fisik');
    }

    public function gulaDarah()
    {
        return $this->belongsTo(GD::class, 'kadar_gula');
    }

    public function rule()
    {
        return $this->belongsTo(Rule::class, 'rule_id'); 
    }
}
