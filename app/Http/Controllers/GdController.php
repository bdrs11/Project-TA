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
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Menambahkan Gula Darah';
            return redirect()->route('SistemPakar.admin.kelola_dm.kadar_gula')->with($notification);
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Menambahkan Gula Darah';
            return redirect()->route('SistemPakar.admin.kelola_dm.kadar_gula.store')->withInput()->with($notification);
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

        $sugar_categorie->update($validatedData);

        if ($sugar_categorie) {
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Mengubah Data Gula Darah';
            return redirect()->route('SistemPakar.admin.kelola_dm.kadar_gula')->with($notification);
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Mengubah Data Gula Darah';
            return redirect()->route('SistemPakar.admin.kelola_dm.kadar_gula.update')->withInput()->with($notification);
        }
    }

    public function destroy($id) 
    {
        $sugar_categorie = GD::findOrFail($id);
        $deleted = $sugar_categorie->delete(); 
    
        if ($deleted) {
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Menghapus Data Gula Darah';
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Menghapus Data Gula Darah';
        }
    
        return redirect()->route('SistemPakar.admin.kelola_dm.kadar_gula')->with($notification);
    }    

    public function display()
    {
        $data['sugar_categories'] = GD::all();
        return view('SistemPakar.admin.kelola_dm.kadar_gula.index', $data);
    }
}
