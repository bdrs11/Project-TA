<?php

namespace App\Http\Controllers;

use App\Models\Km;
use Illuminate\Http\Request;

class KmController extends Controller
{
    public function index()
    {
        $data['food_categories'] = Km::all();
        return view('SistemPakar.admin.kelola_makanan.kategori.index', $data);
    }

    public function create()
    {
        return view('SistemPakar.admin.kelola_makanan.kategori.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $food_categorie = Km::create($validatedData);

        if ($food_categorie) {
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Menambahkan Kategori Makanan';
            return redirect()->route('SistemPakar.admin.kelola_makanan.kategori')->with($notification);
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Menambahkan Kategori Makanan';
            return redirect()->route('SistemPakar.admin.kelola_makanan.kategori.store')->withInput()->with($notification);
        }
    }

    public function edit($id)
    {
        $food_categorie = Km::findOrFail($id);

        return view('SistemPakar.admin.kelola_makanan.kategori.edit', compact('food_categorie'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $food_categorie = Km::findOrFail($id);

        $food_categorie->update($validatedData);

        if ($food_categorie) {
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Mengubah Data Kategori Makanana';
            return redirect()->route('SistemPakar.admin.kelola_makanan.kategori')->with($notification);
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Mengubah Data Kategori Makanan';
            return redirect()->route('SistemPakar.admin.kelola_makanan.kategori.update')->withInput()->with($notification);
        }
    }

    public function destroy($id) 
    {
        $food_categorie = Km::findOrFail($id);
        $deleted = $food_categorie->delete(); 
    
        if ($deleted) {
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Menghapus Data Kategori Makanan';
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Menghapus Data Kategori Makanan';
        }
    
        return redirect()->route('SistemPakar.admin.kelola_makanan.kategori')->with($notification);
    }    

    public function display()
    {
        $data['food_categories'] = Km::all();
        return view('SistemPakar.admin.kelola_makanan.kategori.index', $data);
    }
}
