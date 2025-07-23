<?php

use App\Http\Controllers\AfController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\GdController;
use App\Http\Controllers\ImtController;
use App\Http\Controllers\KmController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecommendController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\UsiaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/SistemPakar/admin/kelola_makanan/kategori', [KmController::class, 'index'])->name('SistemPakar.admin.kelola_makanan.kategori');
    Route::get('/SistemPakar/admin/kelola_makanan.kategori/create', [KmController::class, 'create'])->name('SistemPakar.admin.kelola_makanan.kategori.create');
    Route::post('/SistemPakar/admin/kelola_makanan.kategori', [KmController::class, 'store'])->name('SistemPakar.admin.kelola_makanan.kategori.store');
    Route::get('/SistemPakar/admin/kelola_makanan.kategori/{id}/edit', [KmController::class, 'edit'])->name('SistemPakar.admin.kelola_makanan.kategori.edit');
    Route::match(['put', 'patch'],'/SistemPakar/admin/kelola_makanan.kategori/{id}', [KmController::class, 'update'])->name('SistemPakar.admin.kelola_makanan.kategori.update');
    Route::delete('/SistemPakar/admin/kelola_makanan.kategori/{id}', [KmController::class, 'destroy'])->name('SistemPakar.admin.kelola_makanan.kategori.destroy');

    Route::get('/SistemPakar/admin/kelola_makanan', [FoodController::class, 'index'])->name('SistemPakar.admin.kelola_makanan');
    Route::get('/SistemPakar/admin/kelola_makanan/create', [FoodController::class, 'create'])->name('SistemPakar.admin.kelola_makanan.create');
    Route::post('/SistemPakar/admin/kelola_makanan', [FoodController::class, 'store'])->name('SistemPakar.admin.kelola_makanan.store');
    Route::get('/SistemPakar/admin/kelola_makanan/{id}/edit', [FoodController::class, 'edit'])->name('SistemPakar.admin.kelola_makanan.edit');
    Route::match(['put', 'patch'],'/SistemPakar/admin/kelola_makanan/{id}', [FoodController::class, 'update'])->name('SistemPakar.admin.kelola_makanan.update');
    Route::delete('/SistemPakar/admin/kelola_makanan/{id}', [FoodController::class, 'destroy'])->name('SistemPakar.admin.kelola_makanan.destroy');

    Route::get('/SistemPakar/admin/kelola_dm/usia', [UsiaController::class, 'index'])->name('SistemPakar.admin.kelola_dm.usia');
    Route::get('/SistemPakar/admin/kelola_dm/usia/create', [UsiaController::class, 'create'])->name('SistemPakar.admin.kelola_dm.usia.create');
    Route::post('/SistemPakar/admin/kelola_dm/usia', [UsiaController::class, 'store'])->name('SistemPakar.admin.kelola_dm.usia.store');
    Route::get('/SistemPakar/admin/kelola_dm/usia/{id}/edit', [UsiaController::class, 'edit'])->name('SistemPakar.admin.kelola_dm.usia.edit');
    Route::match(['put', 'patch'],'/SistemPakar/admin/kelola_dm/usia/{id}', [UsiaController::class, 'update'])->name('SistemPakar.admin.kelola_dm.usia.update');
    Route::delete('/SistemPakar/admin/kelola_dm/usia/{id}', [UsiaController::class, 'destroy'])->name('SistemPakar.admin.kelola_dm.usia.destroy');

    Route::get('/SistemPakar/admin/kelola_dm/imt', [ImtController::class, 'index'])->name('SistemPakar.admin.kelola_dm.imt');
    Route::get('/SistemPakar/admin/kelola_dm/imt/create', [ImtController::class, 'create'])->name('SistemPakar.admin.kelola_dm.imt.create');
    Route::post('/SistemPakar/admin/kelola_dm/imt', [ImtController::class, 'store'])->name('SistemPakar.admin.kelola_dm.imt.store');
    Route::get('/SistemPakar/admin/kelola_dm/imt/{id}/edit', [ImtController::class, 'edit'])->name('SistemPakar.admin.kelola_dm.imt.edit');
    Route::match(['put', 'patch'],'/SistemPakar/admin/kelola_dm/imt/{id}', [ImtController::class, 'update'])->name('SistemPakar.admin.kelola_dm.imt.update');
    Route::delete('/SistemPakar/admin/kelola_dm/imt/{id}', [ImtController::class, 'destroy'])->name('SistemPakar.admin.kelola_dm.imt.destroy');

    Route::get('/SistemPakar/admin/kelola_dm/af', [AfController::class, 'index'])->name('SistemPakar.admin.kelola_dm.af');
    Route::get('/SistemPakar/admin/kelola_dm/af/create', [AfController::class, 'create'])->name('SistemPakar.admin.kelola_dm.af.create');
    Route::post('/SistemPakar/admin/kelola_dm/af', [AfController::class, 'store'])->name('SistemPakar.admin.kelola_dm.af.store');
    Route::get('/SistemPakar/admin/kelola_dm/af/{id}/edit', [AfController::class, 'edit'])->name('SistemPakar.admin.kelola_dm.af.edit');
    Route::match(['put', 'patch'],'/SistemPakar/admin/kelola_dm/af/{id}', [AfController::class, 'update'])->name('SistemPakar.admin.kelola_dm.af.update');
    Route::delete('/SistemPakar/admin/kelola_dm/af/{id}', [AfController::class, 'destroy'])->name('SistemPakar.admin.kelola_dm.af.destroy');

    Route::get('/SistemPakar/admin/kelola_dm/kadar_gula', [GdController::class, 'index'])->name('SistemPakar.admin.kelola_dm.kadar_gula');
    Route::get('/SistemPakar/admin/kelola_dm/kadar_gula/create', [GdController::class, 'create'])->name('SistemPakar.admin.kelola_dm.kadar_gula.create');
    Route::post('/SistemPakar/admin/kelola_dm/kadar_gula', [GdController::class, 'store'])->name('SistemPakar.admin.kelola_dm.kadar_gula.store');
    Route::get('/SistemPakar/admin/kelola_dm/kadar_gula/{id}/edit', [GdController::class, 'edit'])->name('SistemPakar.admin.kelola_dm.kadar_gula.edit');
    Route::match(['put', 'patch'],'/SistemPakar/admin/kelola_dm/kadar_gula/{id}', [GdController::class, 'update'])->name('SistemPakar.admin.kelola_dm.kadar_gula.update');
    Route::delete('/SistemPakar/admin/kelola_dm/kadar_gula/{id}', [GdController::class, 'destroy'])->name('SistemPakar.admin.kelola_dm.kadar_gula.destroy');

    Route::get('/SistemPakar/admin/kelola_aturan', [RuleController::class, 'index'])->name('SistemPakar.admin.kelola_aturan');
    Route::get('/SistemPakar/admin/kelola_aturan/create', [RuleController::class, 'create'])->name('SistemPakar.admin.kelola_aturan.create');
    Route::post('/SistemPakar/admin/kelola_aturan', [RuleController::class, 'store'])->name('SistemPakar.admin.kelola_aturan.store');
    Route::get('/SistemPakar/admin/kelola_aturan/{id}/edit', [RuleController::class, 'edit'])->name('SistemPakar.admin.kelola_aturan.edit');
    Route::match(['put', 'patch'],'/SistemPakar/admin/kelola_aturan/{id}', [RuleController::class, 'update'])->name('SistemPakar.admin.kelola_aturan.update');
    Route::delete('/SistemPakar/admin/kelola_aturan/{id}', [RuleController::class, 'destroy'])->name('SistemPakar.admin.kelola_aturan.destroy');

    Route::get('/SistemPakar/admin/kelola_rekomendasi', [RecommendController::class, 'index'])->name('SistemPakar.admin.kelola_rekomendasi');
    Route::get('/SistemPakar/admin/kelola_rekomendasi/create', [RecommendController::class, 'create'])->name('SistemPakar.admin.kelola_rekomendasi.create');
    Route::post('/SistemPakar/admin/kelola_rekomendasi', [RecommendController::class, 'store'])->name('SistemPakar.admin.kelola_rekomendasi.store');
    Route::get('/SistemPakar/admin/kelola_rekomendasi/{id}/edit', [RecommendController::class, 'edit'])->name('SistemPakar.admin.kelola_rekomendasi.edit');
    Route::match(['put', 'patch'],'/SistemPakar/admin/kelola_rekomendasi/{id}', [RecommendController::class, 'update'])->name('SistemPakar.admin.kelola_rekomendasi.update');
    Route::delete('/SistemPakar/admin/kelola_rekomendasi/{id}', [RecommendController::class, 'destroy'])->name('SistemPakar.admin.kelola_rekomendasi.destroy');
});

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/SistemPakar/pengguna/konsultasi', [KonsultasiController::class, 'index'])->name('SistemPakar.pengguna.konsultasi');
    Route::post('/SistemPakar/pengguna/konsultasi', [KonsultasiController::class, 'store'])->name('SistemPakar.pengguna.konsultasi.store');

    Route::get('/SistemPakar/pengguna/riwayat', [RiwayatController::class, 'index'])->name('SistemPakar.pengguna.riwayat');
});

// Route::get('/SistemPakar/pengguna/konsultasi', [KonsultasiController::class, 'index'])->name('SistemPakar.pengguna.konsultasi');
// Route::post('/SistemPakar/pengguna/konsultasi', [KonsultasiController::class, 'store'])->name('SistemPakar.pengguna.konsultasi.store');

require __DIR__.'/auth.php';