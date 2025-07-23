<!-- NAVBAR UTAMA (logo + profil/logout) -->
<nav x-data="{ open: false, openMedis: false, openMakanan: false }" class="bg-black border-b border-gray-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo + Judul -->
            <div class="flex items-center">
                <span class="ml-2 text-lg font-semibold text-white">KonPoMa</span>
            </div>

            <div class="flex space-x-4 ml-auto">
                @if (auth()->user()->role_id == 2)
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-gray-300">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link :href="route('SistemPakar.pengguna.konsultasi')" :active="request()->routeIs('SistemPakar.pengguna.konsultasi')" class="text-white hover:text-gray-300">
                    {{ __('Konsultasi') }}
                </x-nav-link>
                <x-nav-link :href="route('SistemPakar.pengguna.riwayat')" :active="request()->routeIs('SistemPakar.pengguna.riwayat')" class="text-white hover:text-gray-300">
                    {{ __('Riwayat') }}
                </x-nav-link>
                @endif
            </div>

            <!-- Profil (Desktop) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-black hover:text-gray-300 focus:outline-none transition">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-gray-800">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-gray-800">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-300 hover:bg-gray-800 transition">
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

    <!-- RESPONSIVE MENU (mobile) -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden bg-black text-white">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('SistemPakar.pengguna.konsultasi')" :active="request()->routeIs('SistemPakar.pengguna.konsultasi')" class="text-white hover:text-gray-300">
                {{ __('Konsultasi') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('SistemPakar.pengguna.riwayat')" :active="request()->routeIs('SistemPakar.pengguna.riwayat')" class="text-white hover:text-gray-300">
                {{ __('Riwayat') }}
            </x-responsive-nav-link>
        </div>

        <!-- Profil + Logout -->
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-300">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:text-gray-300">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-white hover:text-gray-300">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
