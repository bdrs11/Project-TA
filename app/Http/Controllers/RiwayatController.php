<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id != 2) {
            abort(403, 'Akses hanya untuk pengguna.');
        }

        $consultations = Konsultasi::with([
                'usiaKategori',
                'aktivitas',
                'gulaDarah',
                'recommendation.detailRecommendations.food'
            ])
            ->where('user_id', Auth::id())
            ->latest()
            ->take(1)
            ->get();

        return view('SistemPakar.pengguna.riwayat.index', compact('consultations'));
    }

}
