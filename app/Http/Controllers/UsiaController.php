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
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Menambahkan Usia';
            return redirect()->route('SistemPakar.admin.kelola_dm.usia')->with($notification);
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Menambahkan Usia';
            return redirect()->route('SistemPakar.admin.kelola_dm.usia.store')->withInput()->with($notification);
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

        if ($age_categorie) {
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Mengubah Data Usia';
            return redirect()->route('SistemPakar.admin.kelola_dm.usia')->with($notification);
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Mengubah Data Usia';
            return redirect()->route('SistemPakar.admin.kelola_dm.usia.update')->withInput()->with($notification);
        }
    }

    public function destroy($id) 
    {
        $age_categorie = Usia::findOrFail($id);
        $deleted = $age_categorie->delete(); 
    
        if ($deleted) {
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Menghapus Data Usia';
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Menghapus Data Usia';
        }
    
        return redirect()->route('SistemPakar.admin.kelola_dm.usia')->with($notification);
    }    

    public function display()
    {
        $data['age_categories'] = Usia::all();
        return view('SistemPakar.admin.kelola_dm.usia.index', $data);
    }
}
