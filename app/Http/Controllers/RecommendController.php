<?php

namespace App\Http\Controllers;

use App\Models\DetailRekomendasi;
use App\Models\Food;
use App\Models\Recommend;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecommendController extends Controller
{
    public function index()
    {
        $recommendations = Recommend::with([
        'rule.ageCategory',
        'rule.imtCategory',
        'rule.activity',
        'rule.sugarCategory',
        'details.food'
        ])->get();
        return view('SistemPakar.admin.kelola_rekomendasi.index', compact('recommendations'));
    }

    public function create()
    {
        $rules = Rule::all();
        $foods = Food::all();
        return view('SistemPakar.admin.kelola_rekomendasi.create', compact('rules', 'foods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rule_id' => 'required|exists:rules,id',
            'food_id' => 'required|array',
            'food_id.*' => 'exists:foods,id',
            'keterangan' => 'nullable|string',
        ]);

        // Buat rekomendasi baru untuk rule yang dipilih
        $rekomendasi = Recommend::create([
            'rule_id' => $request->rule_id,
        ]);

        // Simpan setiap makanan ke tabel detail_recommendations
        foreach ($request->food_id as $foodId) {
            DetailRekomendasi::create([
                'rekomendasi_id' => $rekomendasi->id,
                'food_id' => $foodId,
                'keterangan' => $request->keterangan, 
            ]);
        }

        return redirect()->route('SistemPakar.admin.kelola_rekomendasi')
            ->with('success', 'Rekomendasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $rekomendasi = Recommend::with('details.food')->findOrFail($id);
        $rules = Rule::all();
        $foods = Food::all();

        return view('SistemPakar.admin.kelola_rekomendasi.edit', compact('rekomendasi', 'rules', 'foods'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rule_id' => 'required|exists:rules,id',
            'food_id' => 'required|array|min:1',
            'food_id.*' => 'exists:foods,id',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // Cari rekomendasi
        $rekomendasi = Recommend::findOrFail($id);

        // Update rule_id
        $rekomendasi->rule_id = $request->rule_id;
        $rekomendasi->save();

        // Hapus semua detail lama
        $rekomendasi->details()->delete();

        // Tambahkan detail baru
        foreach ($request->food_id as $foodId) {
            $rekomendasi->details()->create([
                'food_id' => $foodId,
                'keterangan' => $request->keterangan 
            ]);
        }

        return redirect()->route('SistemPakar.admin.kelola_rekomendasi')
                        ->with('success', 'Berhasil memperbarui rekomendasi.');
    }

    public function destroy($id) 
    {
        $recommendations = Recommend::findOrFail($id);
        $deleted = $recommendations->delete(); 
    
        if ($deleted) {
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Menghapus Data Rekomendasi';
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Menghapus Data Rekomendasi';
        }
    
        return redirect()->route('SistemPakar.admin.kelola_rekomendasi')->with($notification);
    }    

    public function display()
    {
        $data['rekomendations'] = Recommend::all();
        return view('SistemPakar.admin.kelola_rekomendasi.index', $data);
    }

}
