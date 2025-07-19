<?php

namespace App\Http\Controllers;

use App\Models\AF;
use App\Models\DetailRekomendasi;
use App\Models\GD;
use App\Models\Imt;
use App\Models\Konsultasi;
use App\Models\Recommend;
use App\Models\Rule;
use App\Models\Usia;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function index()
    {
        $age_categories = Usia::all();
        $activitys = AF::all();
        $sugar_categories = GD::all();

        return view('SistemPakar.pengguna.konsultasi.index', compact('age_categories', 'activitys', 'sugar_categories'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'usia' => 'required|exists:age_categories,id',
            'aktivitas_fisik' => 'required|exists:activitys,id',
            'berat_badan' => 'required|numeric|min:1',
            'tinggi_badan' => 'required|numeric|min:1',
            'gula_darah' => 'required|exists:sugar_categories,id',
        ]);

        // Hitung IMT
        $berat = $request->berat_badan;
        $tinggi_m = $request->tinggi_badan / 100;
        $imt = round($berat / ($tinggi_m * $tinggi_m), 2);

        // Cari kategori IMT berdasarkan format rentan_imt
        $imt_categories = Imt::all();
        $kategori_imt_id = null;

        foreach ($imt_categories as $kategori) {
            $rentan = str_replace([',', ' '], ['.', ''], $kategori->rentan_imt);

            if (str_contains($rentan, '-')) {
                [$min, $max] = explode('-', $rentan);
                if ($imt >= (float) $min && $imt <= (float) $max) {
                    $kategori_imt_id = $kategori->id;
                    break;
                }
            } elseif (str_starts_with($rentan, '≥') || str_starts_with($rentan, '>=')) {
                $nilai = (float) ltrim($rentan, '≥>=');
                if ($imt >= $nilai) {
                    $kategori_imt_id = $kategori->id;
                    break;
                }
            } elseif (str_starts_with($rentan, '<=') || str_starts_with($rentan, '≤') || str_starts_with($rentan, '<')) {
                $nilai = (float) ltrim($rentan, '<=≤<');
                if ($imt <= $nilai) {
                    $kategori_imt_id = $kategori->id;
                    break;
                }
            }
        }

        if (!$kategori_imt_id) {
            return back()->withErrors(['imt' => 'Kategori IMT tidak ditemukan.']);
        }

        // Cari rule
        $rule = Rule::where('kategori_usia_id', $request->usia)
            ->where('kategori_imt_id', $kategori_imt_id)
            ->where('aktivitas_fisik_id', $request->aktivitas_fisik)
            ->where('sugar_categorie_id', $request->gula_darah)
            ->first();

        if (!$rule) {
            return back()->withErrors(['rule' => 'Aturan tidak ditemukan.']);
        }

        // Ambil rekomendasi berdasarkan rule
        $rekomendasi = Recommend::where('rule_id', $rule->id)->first();

        if (!$rekomendasi) {
            return back()->withErrors(['rekomendasi' => 'Rekomendasi tidak ditemukan.']);
        }

        // Ambil detail rekomendasi (makanan)
        $detail_rekomendasi = DetailRekomendasi::with('food')
            ->where('rekomendasi_id', $rekomendasi->id)
            ->get();

        if ($detail_rekomendasi->isEmpty()) {
            return back()->withErrors(['makanan' => 'Belum ada makanan pada rekomendasi ini.']);
        }

        // Simpan konsultasi (gunakan salah satu detail_id)
        $first_detail = $detail_rekomendasi->first();

        Konsultasi::create([
            'usia' => $request->usia,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'aktivitas_fisik' => $request->aktivitas_fisik,
            'kadar_gula' => $request->gula_darah,
            'detail_id' => $first_detail->id,
        ]);

        // Kirim hasil ke view
        return view('SistemPakar.pengguna.konsultasi.hasil', [
            'imt' => $imt,
            'rule' => $rule,
            'detail_rekomendasi' => $detail_rekomendasi,
            'berat' => $berat,
            'tinggi' => $tinggi_m,
        ]);
    }
}
