<?php

namespace App\Http\Controllers;

use App\Models\AF;
use Illuminate\Http\Request;

class AfController extends Controller
{
    public function index()
    {
        $data['activitys'] = AF::all();
        return view('SistemPakar.admin.kelola_dm.af.index', $data);
    }

    public function create()
    {
        return view('SistemPakar.admin.kelola_dm.af.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        $activity = AF::create($validatedData);

        if ($activity) {
            return redirect()->route('SistemPakar.admin.kelola_dm.af')
                ->with('success', 'Berhasil Menambahkan Aktivitas Fisik');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal Menambahkan Aktivitas Fisik');
        }
    }

    public function edit($id)
    {
        $activity = AF::findOrFail($id);

        return view('SistemPakar.admin.kelola_dm.af.edit', compact('activity'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kategori' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        $activity = AF::findOrFail($id);
        $updated = $activity->update($validatedData);

        if ($updated) {
            return redirect()->route('SistemPakar.admin.kelola_dm.af')
                ->with('success', 'Berhasil Mengubah Data Aktivitas Fisik');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal Mengubah Data Aktivitas Fisik');
        }
    }

    public function destroy($id) 
    {
        $activity = AF::findOrFail($id);
        $deleted = $activity->delete();

        if ($deleted) {
            return redirect()->route('SistemPakar.admin.kelola_dm.af')
                ->with('success', 'Berhasil Menghapus Data Aktivitas Fisik');
        } else {
            return redirect()->route('SistemPakar.admin.kelola_dm.af')
                ->with('error', 'Gagal Menghapus Data Aktivitas Fisik');
        }
    }    

    public function display()
    {
        $data['activitys'] = AF::all();
        return view('SistemPakar.admin.kelola_dm.af.index', $data);
    }
}
