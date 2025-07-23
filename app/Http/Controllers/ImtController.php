<?php

namespace App\Http\Controllers;

use App\Models\Imt;
use Illuminate\Http\Request;

class ImtController extends Controller
{
    public function index()
    {
        $data['imt_categories'] = Imt::all();
        return view('SistemPakar.admin.kelola_dm.imt.index', $data);
    }

    public function create()
    {
        return view('SistemPakar.admin.kelola_dm.imt.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori_imt' => 'required|string|max:255',
            'rentan_imt' => 'required|string',
            'keterangan' => 'required|string|max:255',
        ]);

        $imt_categorie = Imt::create($validatedData);

        if ($imt_categorie) {
            return redirect()->route('SistemPakar.admin.kelola_dm.imt')
                ->with('success', 'Berhasil menambahkan kategori IMT.');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menambahkan kategori IMT.');
        }
    }

    public function edit($id)
    {
        $imt_categorie = Imt::findOrFail($id);

        return view('SistemPakar.admin.kelola_dm.imt.edit', compact('imt_categorie'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kategori_imt' => 'required|string|max:255',
            'rentan_imt' => 'required|string',
            'keterangan' => 'required|string|max:255',
        ]);

        $imt_categorie = Imt::findOrFail($id);
        $updated = $imt_categorie->update($validatedData);

        if ($updated) {
            return redirect()->route('SistemPakar.admin.kelola_dm.imt')
                ->with('success', 'Berhasil mengubah data IMT.');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal mengubah data IMT.');
        }
    }

    public function destroy($id) 
    {
        $imt_categorie = Imt::findOrFail($id);
        $deleted = $imt_categorie->delete(); 
    
        if ($deleted) {
            return redirect()->route('SistemPakar.admin.kelola_dm.imt')
                ->with('success', 'Berhasil menghapus data IMT.');
        } else {
            return redirect()->route('SistemPakar.admin.kelola_dm.imt')
                ->with('error', 'Gagal menghapus data IMT.');
        }
    }    

    public function display()
    {
        $data['imt_categories'] = Imt::all();
        return view('SistemPakar.admin.kelola_dm.imt.index', $data);
    }
}
