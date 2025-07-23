<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Km;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    public function index()
    {
        $data['foods'] = Food::all();
        return view('SistemPakar.admin.kelola_makanan.index', $data);
    }

    public function create()
    {
        $food_categories = Km::all(); // ambil semua kategori dari tabel food_categories
        return view('SistemPakar.admin.kelola_makanan.create', compact('food_categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'food_categorie_id' => 'required|exists:food_categories,id',
            'keterangan' => 'required|string|max:255',
        ]);

        $validatedData['user_id'] = Auth::id();
        $food = Food::create($validatedData);

        if ($food) {
            return redirect()->route('SistemPakar.admin.kelola_makanan')
                ->with('success', 'Berhasil Menambahkan Makanan');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal Menambahkan Makanan');
        }
    }

    public function edit($id)
    {
        $food = Food::findOrFail($id);
        $food_categories = Km::all(); 

        return view('SistemPakar.admin.kelola_makanan.edit', compact('food', 'food_categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'food_categorie_id' => 'required|exists:food_categories,id',
            'keterangan' => 'required|string|max:255',
        ]);

        $food = Food::findOrFail($id);

        $food->update($validatedData);
        $updated = $food->update($validatedData);

        if ($updated) {
            return redirect()->route('SistemPakar.admin.kelola_makanan')
                ->with('success', 'Berhasil Mengubah Data Makanan');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal Mengubah Data Makanan');
        }
    }

    public function destroy($id) 
    {
        $food = Food::findOrFail($id);
        $deleted = $food->delete(); 
        
        if ($deleted) {
            return redirect()->route('SistemPakar.admin.kelola_makanan')
                ->with('success', 'Berhasil Menghapus Data Makanan');
        } else {
            return redirect()->route('SistemPakar.admin.kelola_makanan')
                ->with('error', 'Gagal Menghapus Data Makanan');
        }
    }    

    public function display()
    {
        $data['foods'] = Food::all();
        return view('SistemPakar.admin.kelola_makanan.index', $data);
    }
}
