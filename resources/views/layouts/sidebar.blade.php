<aside class="w-64 bg-gray-900 text-white min-h-screen flex flex-col justify-between">
    <!-- Header -->
    <div>
        <div class="p-4 text-lg font-bold border-b border-gray-700">KonPoMa</div>
        <nav class="mt-4 flex flex-col space-y-1 px-4">

            <!-- Dashboard -->
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                class="{{ request()->routeIs('dashboard') ? 'bg-gray-800 text-white rounded' : 'text-gray-300 hover:bg-gray-800 hover:text-white rounded' }}">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-gray-400' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>{{ __('Dashboard') }}</span>
                </div>
            </x-nav-link>

            <!-- Data Medis -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex justify-between items-center text-sm text-left text-gray-300 px-2 py-2 rounded hover:bg-gray-800 hover:text-white">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Data Medis Pasien</span>
                    </div>
                    <svg class="w-4 h-4 transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="ml-6 mt-1 space-y-1">
                    <x-nav-link :href="route('SistemPakar.admin.kelola_dm.usia')" class="text-gray-300 hover:bg-gray-800 hover:text-white">
                        {{ __('Kategori Usia') }}
                    </x-nav-link>
                    <br>

                    <x-nav-link :href="route('SistemPakar.admin.kelola_dm.imt')" class="text-gray-300 hover:bg-gray-800 hover:text-white">
                        {{ __('Kategori IMT') }}
                    </x-nav-link>
                    <br>

                    <x-nav-link :href="route('SistemPakar.admin.kelola_dm.af')" class="text-gray-300 hover:bg-gray-800 hover:text-white">
                        {{ __('Aktivitas Fisik') }}
                    </x-nav-link>
                    <br>

                    <x-nav-link :href="route('SistemPakar.admin.kelola_dm.kadar_gula')" class="text-gray-300 hover:bg-gray-800 hover:text-white">
                        {{ __('Kategori Gula Darah') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Kelola Makanan -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex justify-between items-center text-sm text-left text-gray-300 px-2 py-2 rounded hover:bg-gray-800 hover:text-white">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <span>Kelola Makanan</span>
                    </div>
                    <svg class="w-4 h-4 transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="ml-6 mt-1 space-y-1">
                    <x-nav-link :href="route('SistemPakar.admin.kelola_makanan')" class="text-gray-300 hover:bg-gray-800 hover:text-white">
                        {{ __('Daftar Makanan') }}
                    </x-nav-link>
                    <br>

                    <x-nav-link :href="route('SistemPakar.admin.kelola_makanan.kategori')" class="text-gray-300 hover:bg-gray-800 hover:text-white">
                        {{ __('Kategori Makanan') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Kelola Aturan -->
            <x-nav-link :href="route('SistemPakar.admin.kelola_aturan')" class="text-gray-300 hover:bg-gray-800 hover:text-white">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6M5 8h14" />
                    </svg>
                    <span>{{ __('Kelola Aturan') }}</span>
                </div>
            </x-nav-link>

            <!-- Kelola Rekomendasi -->
            <x-nav-link :href="route('SistemPakar.admin.kelola_rekomendasi')" class="text-gray-300 hover:bg-gray-800 hover:text-white">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span>{{ __('Kelola Rekomendasi') }}</span>
                </div>
            </x-nav-link>

        </nav>
    </div>

    <!-- Footer -->
    <div class="border-t border-gray-700 px-4 py-4">
        <a href="{{ route('profile.edit') }}" class="block text-sm text-gray-300 mb-2 hover:text-white">
            {{ Auth::user()->name }}
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left text-sm text-red-400 hover:text-red-600">
                {{ __('Logout') }}
            </button>
        </form>
    </div>
</aside>
