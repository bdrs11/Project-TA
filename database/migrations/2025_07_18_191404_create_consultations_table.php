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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('usia');
            $table->integer('berat_badan');
            $table->integer('tinggi_badan');
            $table->string('aktivitas_fisik');
            $table->string('kadar_gula');
            // $table->foreignId('rekomendasi_id')->constrained('recommendations')->onDelete('cascade');
            $table->foreignId('detail_id')->constrained('detail_recommendations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
