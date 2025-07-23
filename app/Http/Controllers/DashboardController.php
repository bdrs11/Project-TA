<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Recommend;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
        public function index()
    {
        // Data role user
        $totalAdmin = User::where('role_id', 1)->count();   // Admin
        $totalPengguna = User::where('role_id', 2)->count(); // Pengguna
    
        // Data lain (opsional, sesuaikan kebutuhan)
        $totalMakanan = Food::count();
        $totalRule = Rule::count();
        $totalRekomendasi = Recommend::count();
    
        return view('dashboard', compact(
            'totalAdmin', 'totalPengguna', 
            'totalMakanan', 'totalRule', 'totalRekomendasi'
        ));
    }
}
