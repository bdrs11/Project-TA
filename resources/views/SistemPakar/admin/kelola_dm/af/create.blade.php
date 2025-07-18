<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menambahkan Kategori Aktivitas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('SistemPakar.admin.kelola_dm.af.store') }}" method="POST">
                        @csrf

                        <div class="max-w-xl">
                            <x-input-label for="kategori" value="Kategori AKtivitas" />
                            <x-text-input id="kategori" type="text" name="kategori" class="mt-1 block w-full" value="{{ old('kategori') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('kategori')" />
                        </div>
                        <br>

                        {{-- <div class="max-w-xl">
                            <x-input-label for="rentan_usia" value="Rentan Usia" />
                            <x-text-input id="rentan_usia" type="text" name="rentan_usia" class="mt-1 block w-full" value="{{ old('rentan_usia') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('rentan_usia')" />
                        </div>
                        <br> --}}

                        <div class="max-w-xl">
                            <x-input-label for="keterangan" value="Keterangan" />
                            <x-text-input id="keterangan" type="text" name="keterangan" class="mt-1 block w-full" value="{{ old('keterangan') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                        </div>
                        <br> 

                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                        <x-secondary-button tag="a" href="{{ route('SistemPakar.admin.kelola_dm.af') }}">Kembali</x-secondary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>