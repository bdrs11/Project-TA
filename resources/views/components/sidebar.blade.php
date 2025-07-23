@if (auth()->user()->role_id == 1)
<div class="w-64 h-screen fixed top-0 left-0 bg-gray-800 text-white z-50">
    <div class="p-4 text-xl font-bold border-b border-gray-700">
        KonPoMa
    </div>
    <nav class="mt-4">
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">Dashboard</a>

        <!-- Data Medis -->
        <details class="px-4 group">
            <summary class="py-2 cursor-pointer hover:bg-gray-700">Data Medis</summary>
            <div class="pl-4">
                <a href="{{ route('SistemPakar.admin.kelola_dm.usia') }}" class="block py-1 hover:text-gray-300">Kategori Usia</a>
                <a href="{{ route('SistemPakar.admin.kelola_dm.imt') }}" class="block py-1 hover:text-gray-300">Kategori IMT</a>
                <a href="{{ route('SistemPakar.admin.kelola_dm.af') }}" class="block py-1 hover:text-gray-300">Aktivitas Fisik</a>
                <a href="{{ route('SistemPakar.admin.kelola_dm.kadar_gula') }}" class="block py-1 hover:text-gray-300">Kategori Gula Darah</a>
            </div>
        </details>

        <!-- Makanan -->
        <details class="px-4 group">
            <summary class="py-2 cursor-pointer hover:bg-gray-700">Kelola Makanan</summary>
            <div class="pl-4">
                <a href="{{ route('SistemPakar.admin.kelola_makanan') }}" class="block py-1 hover:text-gray-300">Daftar Makanan</a>
                <a href="{{ route('SistemPakar.admin.kelola_makanan.kategori') }}" class="block py-1 hover:text-gray-300">Kategori Makanan</a>
            </div>
        </details>

        <a href="{{ route('SistemPakar.admin.kelola_aturan') }}" class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('SistemPakar.admin.kelola_aturan') ? 'bg-gray-700' : '' }}">Kelola Aturan</a>
        <a href="{{ route('SistemPakar.admin.kelola_rekomendasi') }}" class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('SistemPakar.admin.kelola_rekomendasi') ? 'bg-gray-700' : '' }}">Kelola Rekomendasi</a>

        <!-- Profil dan Logout -->
        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-700">Profil</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full text-left px-4 py-2 hover:bg-gray-700">Logout</button>
        </form>
    </nav>
</div>
@endif
