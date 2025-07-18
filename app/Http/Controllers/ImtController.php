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
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Menambahkan IMT';
            return redirect()->route('SistemPakar.admin.kelola_dm.imt')->with($notification);
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Menambahkan IMT';
            return redirect()->route('SistemPakar.admin.kelola_dm.imt.store')->withInput()->with($notification);
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

        $imt_categorie->update($validatedData);

        if ($imt_categorie) {
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Mengubah Data IMT';
            return redirect()->route('SistemPakar.admin.kelola_dm.imt')->with($notification);
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Mengubah Data IMT';
            return redirect()->route('SistemPakar.admin.kelola_dm.imt.update')->withInput()->with($notification);
        }
    }

    public function destroy($id) 
    {
        $imt_categorie = Imt::findOrFail($id);
        $deleted = $imt_categorie->delete(); 
    
        if ($deleted) {
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Menghapus Data IMT';
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Menghapus Data IMT';
        }
    
        return redirect()->route('SistemPakar.admin.kelola_dm.imt')->with($notification);
    }    

    public function display()
    {
        $data['imt_categories'] = Imt::all();
        return view('SistemPakar.admin.kelola_dm.imt.index', $data);
    }
}
