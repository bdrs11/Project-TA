<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailRekomendasi extends Model
{
    protected $table = 'detail_recommendations';
    protected $fillable = [
        'rekomendasi_id', 
        'food_id',
        'keterangan'
    ];


    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class, 'food_id');
    }

    public function recommend(): BelongsTo
    {
        return $this->belongsTo(Recommend::class, 'rekomendasi_id');
    }
}
