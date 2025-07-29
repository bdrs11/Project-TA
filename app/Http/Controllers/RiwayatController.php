<?php

namespace App\Http\Controllers;

use App\Models\DetailRekomendasi;
use App\Models\Konsultasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->role_id != 2) {
            abort(403, 'Akses hanya untuk pengguna.');
        }

        $semuaTanggal = Konsultasi::where('user_id', Auth::id())
        ->orderByDesc('created_at')
        ->get(['id', 'created_at']);

        $query = Konsultasi::with([
            'usiaKategori',
            'aktivitas',
            'gulaDarah',
            'rule',
            'detail.food'
        ])->where('user_id', Auth::id());

        // Filter jika tanggal dikirim
        if ($request->filled('tanggal')) {
            $query->where('created_at', $request->tanggal); // akan cocokkan hingga waktu detik
        }

        $consultations = $query->latest()->take(1)->get();

        $rekomendasiId = null;
        if ($consultations->isNotEmpty()) {
            $rekomendasiId = $consultations->first()->detail?->rekomendasi_id;
        }

        $semuaMakanan = collect();
        if ($rekomendasiId) {
            $semuaMakanan = DetailRekomendasi::with('food')
                ->where('rekomendasi_id', $rekomendasiId)
                ->get();
        }

        return view('SistemPakar.pengguna.riwayat.index', compact('consultations', 'semuaMakanan', 'semuaTanggal'));
    }

}
