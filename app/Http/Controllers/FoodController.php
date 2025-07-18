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
        ]);

        $validatedData['user_id'] = Auth::id();
        $food = Food::create($validatedData);

        if ($food) {
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Menambahkan Makanan';
            return redirect()->route('SistemPakar.admin.kelola_makanan')->with($notification);
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Menambahkan Makanan';
            return redirect()->route('SistemPakar.admin.kelola_makanan.store')->withInput()->with($notification);
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
        ]);

        $food = Food::findOrFail($id);

        $food->update($validatedData);

        if ($food) {
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Mengubah Data Makanana';
            return redirect()->route('SistemPakar.admin.kelola_makanan')->with($notification);
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Mengubah Data Makanan';
            return redirect()->route('SistemPakar.admin.kelola_makanan.update')->withInput()->with($notification);
        }
    }

    public function destroy($id) 
    {
        $food = Food::findOrFail($id);
        $deleted = $food->delete(); 
    
        if ($deleted) {
            $notification['alert-type'] = 'success';
            $notification['message'] = 'Berhasil Menghapus Data Makanan';
        } else {
            $notification['alert-type'] = 'error';
            $notification['message'] = 'Gagal Menghapus Data Makanan';
        }
    
        return redirect()->route('SistemPakar.admin.kelola_makanan')->with($notification);
    }    

    public function display()
    {
        $data['foods'] = Food::all();
        return view('SistemPakar.admin.kelola_makanan.index', $data);
    }
}
