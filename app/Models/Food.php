<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    protected $fillable = [
        'nama_makanan',
        'food_categorie_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Km::class, 'food_categorie_id');
    }

}
