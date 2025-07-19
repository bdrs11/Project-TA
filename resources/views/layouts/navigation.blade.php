<!-- NAVBAR UTAMA (logo + profil/logout) -->
<nav x-data="{ open: false, openMedis: false, openMakanan: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo + Judul -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
                <span class="ml-2 text-lg font-semibold text-gray-800">KonPoMa</span>
            </div>

            <!-- Profil (Desktop) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- NAVBAR SEKUNDER (menu utama desktop) -->
    <div class="border-t border-gray-100 bg-gray-50 hidden sm:block">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex space-x-4 py-2">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>

                <!-- Dropdown Data Medis Pasien -->
                <x-dropdown align="left">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-600 bg-white hover:text-gray-800 focus:outline-none transition">
                            <div>{{ __('Data Medis Pasien') }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('SistemPakar.admin.kelola_dm.usia')">
                            {{ __('Kategori Usia') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('SistemPakar.admin.kelola_dm.imt')">
                            {{ __('Kategori IMT') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('SistemPakar.admin.kelola_dm.af')">
                            {{ __('Aktivitas Fisik') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('SistemPakar.admin.kelola_dm.kadar_gula')">
                            {{ __('Kategori Gula Darah') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>

                <!-- Dropdown Kelola Makanan -->
                <x-dropdown align="left">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-600 bg-white hover:text-gray-800 focus:outline-none transition">
                            <div>{{ __('Kelola Makanan') }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('SistemPakar.admin.kelola_makanan')">
                            {{ __('Daftar Makanan') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('SistemPakar.admin.kelola_makanan.kategori')">
                            {{ __('Kategori Makanan') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>

                <x-nav-link :href="route('SistemPakar.admin.kelola_aturan')" :active="request()->routeIs('SistemPakar.admin.kelola_aturan')">
                    {{ __('Kelola Aturan') }}
                </x-nav-link>

                <x-nav-link :href="route('SistemPakar.admin.kelola_rekomendasi')" :active="request()->routeIs('SistemPakar.admin.kelola_rekomendasi')">
                    {{ __('Kelola Rekomendasi') }}
                </x-nav-link>

                <x-nav-link :href="route('SistemPakar.pengguna.konsultasi')" :active="request()->routeIs('SistemPakar.pengguna.konsultasi')">
                    {{ __('Konsultasi') }}
                </x-nav-link>

            </div>
        </div>
    </div>

    <!-- RESPONSIVE MENU (mobile) -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden">
        <!-- Link Utama -->
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <!-- Toggle untuk Data Medis Pasien -->
            <div class="px-4">
                <button @click="openMedis = !openMedis" class="w-full flex justify-between items-center text-left text-gray-700 text-sm font-medium py-2 hover:text-gray-900">
                    <span>Data Medis Pasien</span>
                    <svg class="h-4 w-4 transform" :class="{ 'rotate-180': openMedis }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="openMedis" class="mt-1 space-y-1 pl-4">
                    <x-responsive-nav-link :href="route('SistemPakar.admin.kelola_dm.usia')">
                        {{ __('Kategori Usia') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('SistemPakar.admin.kelola_dm.imt')">
                        {{ __('Kategori IMT') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('SistemPakar.admin.kelola_dm.af')">
                        {{ __('Aktivitas Fisik') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('SistemPakar.admin.kelola_dm.kadar_gula')">
                        {{ __('Kategori Gula Darah') }}
                    </x-responsive-nav-link>
                </div>
            </div>

            <!-- Toggle untuk Kelola Makanan -->
            <div class="px-4">
                <button @click="openMakanan = !openMakanan" class="w-full flex justify-between items-center text-left text-gray-700 text-sm font-medium py-2 hover:text-gray-900">
                    <span>Kelola Makanan</span>
                    <svg class="h-4 w-4 transform" :class="{ 'rotate-180': openMakanan }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="openMakanan" class="mt-1 space-y-1 pl-4">
                    <x-responsive-nav-link :href="route('SistemPakar.admin.kelola_makanan')">
                        {{ __('Daftar Makanan') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('SistemPakar.admin.kelola_makanan.kategori')">
                        {{ __('Kategori Makanan') }}
                    </x-responsive-nav-link>
                </div>
            </div>

            <x-responsive-nav-link :href="route('SistemPakar.admin.kelola_aturan')" :active="request()->routeIs('SistemPakar.admin.kelola_aturan')">
                {{ __('Kelola Aturan') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('SistemPakar.admin.kelola_rekomendasi')" :active="request()->routeIs('SistemPakar.admin.kelola_rekomendasi')">
                {{ __('Kelola Rekomendasi') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('SistemPakar.pengguna.konsultasi')" :active="request()->routeIs('SistemPakar.pengguna.konsultasi')">
                {{ __('Konsultasi') }}
            </x-responsive-nav-link>

        </div>

        <!-- Profil + Logout -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>