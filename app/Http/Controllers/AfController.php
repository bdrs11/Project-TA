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
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Menambahkan AKtifitas Fisik';
            return redirect()->route('SistemPakar.admin.kelola_dm.af')->with($notification);
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Menambahkan Aktivitas Fisik';
            return redirect()->route('SistemPakar.admin.kelola_dm.af.store')->withInput()->with($notification);
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

        $activity->update($validatedData);

        if ($activity) {
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Mengubah Data Aktivitas Fisik';
            return redirect()->route('SistemPakar.admin.kelola_dm.af')->with($notification);
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Mengubah Data Aktivitas Fisik';
            return redirect()->route('SistemPakar.admin.kelola_dm.af.update')->withInput()->with($notification);
        }
    }

    public function destroy($id) 
    {
        $activity = AF::findOrFail($id);
        $deleted = $activity->delete(); 
    
        if ($deleted) {
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Menghapus Data Aktivitas Fisik';
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Menghapus Data Aktivitas Fisik';
        }
    
        return redirect()->route('SistemPakar.admin.kelola_dm.af')->with($notification);
    }    

    public function display()
    {
        $data['activitys'] = AF::all();
        return view('SistemPakar.admin.kelola_dm.af.index', $data);
    }
}
