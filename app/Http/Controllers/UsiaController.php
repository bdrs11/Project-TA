<?php

namespace App\Http\Controllers;

use App\Models\Usia;
use Illuminate\Http\Request;

class UsiaController extends Controller
{
    public function index()
    {
        $data['age_categories'] = Usia::all();
        return view('SistemPakar.admin.kelola_dm.usia.index', $data);
    }

    public function create()
    {
        return view('SistemPakar.admin.kelola_dm.usia.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kelompok_usia' => 'required|string|max:255',
            'rentan_usia' => 'required|string',
            'keterangan' => 'required|string|max:255',
        ]);

        $age_categorie = Usia::create($validatedData);

        if ($age_categorie) {
            return redirect()->route('SistemPakar.admin.kelola_dm.usia')
                ->with('success', 'Berhasil Menambahkan Usia');
        } else {
            return redirect()->route('SistemPakar.admin.kelola_dm.usia.create')
                ->withInput()
                ->with('success', 'Gagal Menambahkan Usia');
        }
    }

    public function edit($id)
    {
        $age_categorie = Usia::findOrFail($id);

        return view('SistemPakar.admin.kelola_dm.usia.edit', compact('age_categorie'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
           'kelompok_usia' => 'required|string|max:255',
            'rentan_usia' => 'required|string',
            'keterangan' => 'required|string|max:255',
        ]);

        $age_categorie = Usia::findOrFail($id);

        $age_categorie->update($validatedData);
        $updated = $age_categorie->update($validatedData);

        if ($updated) {
            return redirect()->route('SistemPakar.admin.kelola_dm.usia')
                ->with('success', 'Berhasil Mengubah Data Usia');
        } else {
            return redirect()->route('SistemPakar.admin.kelola_dm.usia.edit', $id)
                ->withInput()
                ->with('success', 'Gagal Mengubah Data Usia');
        }
    }

    public function destroy($id) 
    {
        $age_categorie = Usia::findOrFail($id);
        $deleted = $age_categorie->delete();

        if ($deleted) {
            return redirect()->route('SistemPakar.admin.kelola_dm.usia')
                ->with('success', 'Berhasil Menghapus Data Usia');
        } else {
            return redirect()->route('SistemPakar.admin.kelola_dm.usia')
                ->with('success', 'Gagal Menghapus Data Usia');
        }

    }    

    public function display()
    {
        $data['age_categories'] = Usia::all();
        return view('SistemPakar.admin.kelola_dm.usia.index', $data);
    }
}
