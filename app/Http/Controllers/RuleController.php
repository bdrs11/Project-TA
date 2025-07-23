<?php

namespace App\Http\Controllers;

use App\Models\AF;
use App\Models\GD;
use App\Models\Imt;
use App\Models\Rule;
use App\Models\Usia;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class RuleController extends Controller
{
    public function index()
    {
        $data['rules'] = Rule::with(['ageCategory', 'imtCategory', 'activity', 'sugarCategory'])->get();
        return view('SistemPakar.admin.kelola_aturan.index', $data);
    }

    public function create()
    {
        $age_categories = Usia::all();
        $imt_categories = Imt::all();
        $activitys = AF::all();
        $sugar_categories = GD::all();
        return view('SistemPakar.admin.kelola_aturan.create', compact('age_categories', 'imt_categories', 'activitys', 'sugar_categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'kategori_usia_id' => 'required|exists:age_categories,id',
        'kategori_imt_id' => 'required|exists:imt_categories,id',
        'aktivitas_fisik_id' => 'required|exists:activitys,id',
        'sugar_categorie_id' => 'required|exists:sugar_categories,id',
        'keterangan' => 'required|string|max:255',
        ]);

        $validatedData['user_id'] = FacadesAuth::id();
        $rule = Rule::create($validatedData);

        if ($rule) {
            return redirect()->route('SistemPakar.admin.kelola_aturan')
                ->with('success', 'Berhasil Menambahkan Aturan');
        } else {
            return redirect()->route('SistemPakar.admin.kelola_aturan.create')
                ->withInput()
                ->with('error', 'Gagal Menambahkan Aturan');
        }
    }

    public function edit($id)
    {
        $rule = Rule::findOrFail($id);
        $age_categories = Usia::all();
        $imt_categories = Imt::all();
        $activitys = AF::all();
        $sugar_categories = GD::all();

        return view('SistemPakar.admin.kelola_aturan.edit', compact('rule', 'age_categories', 'imt_categories', 'activitys', 'sugar_categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
        'kategori_usia_id' => 'required|exists:age_categories,id',
        'kategori_imt_id' => 'required|exists:imt_categories,id',
        'aktivitas_fisik_id' => 'required|exists:activitys,id',
        'sugar_categorie_id' => 'required|exists:sugar_categories,id',
        'keterangan' => 'required|string|max:255',
        ]);

        $rule = Rule::findOrFail($id);
        $updated = $rule->update($validatedData);

        if ($updated) {
            return redirect()->route('SistemPakar.admin.kelola_aturan')
                ->with('success', 'Berhasil Mengubah Data Aturan');
        } else {
            return redirect()->route('SistemPakar.admin.kelola_aturan.edit', $id)
                ->withInput()
                ->with('error', 'Gagal Mengubah Data Aturan');
        }
    }

    public function destroy($id) 
    {
        $rule = Rule::findOrFail($id);
        $deleted = $rule->delete(); 
    
        if ($deleted) {
            return redirect()->route('SistemPakar.admin.kelola_aturan')
                ->with('success', 'Berhasil Menghapus Data Aturan');
        } else {
            return redirect()->route('SistemPakar.admin.kelola_aturan')
                ->with('error', 'Gagal Menghapus Data Aturan');
        }
    }    

    public function display()
    {
        $data['rules'] = Rule::all();
        return view('SistemPakar.admin.kelola_aturan.index', $data);
    }
}
