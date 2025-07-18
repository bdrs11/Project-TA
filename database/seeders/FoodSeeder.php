<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('foods')->insert([
            [
                'user_id' => 1,
                'nama_makanan' => 'Nasi Merah',
                'kategori' => 'Karbohidrat Kompleks',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'nama_makanan' => 'Ayam Panggang',
                'kategori' => 'Protein',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'nama_makanan' => 'Bayam',
                'kategori' => 'Sayuran',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'nama_makanan' => 'Apel',
                'kategori' => 'Buah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'nama_makanan' => 'Roti Gandum',
                'kategori' => 'Karbohidrat Kompleks',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
