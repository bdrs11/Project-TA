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
            return redirect()->route('SistemPakar.admin.kelola_makanan.kategori')
                ->with('success', 'Berhasil menambahkan kategori makanan.');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menambahkan kategori makanan.');
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
        $updated = $food_categorie->update($validatedData);

        if ($updated) {
            return redirect()->route('SistemPakar.admin.kelola_makanan.kategori')
                ->with('success', 'Berhasil mengubah data kategori makanan.');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal mengubah data kategori makanan.');
        }
    }

    public function destroy($id) 
    {
        $food_categorie = Km::findOrFail($id);
        $deleted = $food_categorie->delete(); 
    
        if ($deleted) {
            return redirect()->route('SistemPakar.admin.kelola_makanan.kategori')
                ->with('success', 'Berhasil menghapus data kategori makanan.');
        } else {
            return redirect()->route('SistemPakar.admin.kelola_makanan.kategori')
                ->with('error', 'Gagal menghapus data kategori makanan.');
        }
    }    

    public function display()
    {
        $data['food_categories'] = Km::all();
        return view('SistemPakar.admin.kelola_makanan.kategori.index', $data);
    }
}
