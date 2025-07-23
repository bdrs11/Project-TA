<?php

namespace App\Http\Controllers;

use App\Models\GD;
use Illuminate\Http\Request;

class GdController extends Controller
{
    public function index()
    {
        $data['sugar_categories'] = GD::all();
        return view('SistemPakar.admin.kelola_dm.kadar_gula.index', $data);
    }

    public function create()
    {
        return view('SistemPakar.admin.kelola_dm.kadar_gula.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori' => 'required|string|max:255',
            'rentan' => 'required|string',
            'keterangan' => 'required|string|max:255',
        ]);

        $sugar_categorie = GD::create($validatedData);

        if ($sugar_categorie) {
            return redirect()->route('SistemPakar.admin.kelola_dm.kadar_gula')
                ->with('success', 'Berhasil Menambahkan Gula Darah');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal Menambahkan Gula Darah');
        }
    }

    public function edit($id)
    {
        $sugar_categorie = GD::findOrFail($id);

        return view('SistemPakar.admin.kelola_dm.kadar_gula.edit', compact('sugar_categorie'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
           'kategori' => 'required|string|max:255',
            'rentan' => 'required|string',
            'keterangan' => 'required|string|max:255',
        ]);

        $sugar_categorie = GD::findOrFail($id);
        $updated = $sugar_categorie->update($validatedData);

        if ($updated) {
            return redirect()->route('SistemPakar.admin.kelola_dm.kadar_gula')
                ->with('success', 'Berhasil Mengubah Data Gula Darah');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal Mengubah Data Gula Darah');
        }
    }

    public function destroy($id) 
    {
        $sugar_categorie = GD::findOrFail($id);
        $deleted = $sugar_categorie->delete(); 
    
        if ($deleted) {
            return redirect()->route('SistemPakar.admin.kelola_dm.kadar_gula')
                ->with('success', 'Berhasil Menghapus Data Gula Darah');
        } else {
            return redirect()->route('SistemPakar.admin.kelola_dm.kadar_gula')
                ->with('error', 'Gagal Menghapus Data Gula Darah');
        }
    }    

    public function display()
    {
        $data['sugar_categories'] = GD::all();
        return view('SistemPakar.admin.kelola_dm.kadar_gula.index', $data);
    }
}
