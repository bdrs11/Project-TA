<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    protected $table = 'recommendations';

    protected $fillable = ['rule_id'];

    public function rule()
    {
        return $this->belongsTo(Rule::class, 'rule_id');
    }

    public function detailRecommendations()
    {
        return $this->hasMany(DetailRekomendasi::class, 'rekomendasi_id');
    }

    // Alias agar bisa dipanggil dengan ->details
    public function details()
    {
        return $this->hasMany(DetailRekomendasi::class, 'rekomendasi_id');
    }
}
