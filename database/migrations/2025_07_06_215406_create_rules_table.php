<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            // Relasi ke users (jika aturan disusun oleh user/admin tertentu)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    
            $table->foreignId('kategori_usia_id')->constrained('age_categories')->onDelete('cascade');

            $table->foreignId('kategori_imt_id')->constrained('imt_categories')->onDelete('cascade');

            // Relasi ke tabel activitys
            $table->foreignId('aktivitas_fisik_id')->constrained('activitys')->onDelete('cascade');

            // Relasi ke sugar_categories
            $table->foreignId('sugar_categorie_id')->constrained('sugar_categories')->onDelete('cascade');

            $table->string('keterangan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rules');
    }
};