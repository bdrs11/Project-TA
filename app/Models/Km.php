<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Km extends Model
{
    protected $table = 'food_categories';
    protected $fillable = [
        'nama_kategori'
    ];

    public function foods()
    {
        return $this->hasMany(Food::class, 'food_categorie_id');
    }

}
