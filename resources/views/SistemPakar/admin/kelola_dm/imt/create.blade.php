<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menambahkan Usia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('SistemPakar.admin.kelola_dm.imt.store') }}" method="POST">
                        @csrf

                        <div class="max-w-xl">
                            <x-input-label for="kategori_imt" value="Kategori IMT" />
                            <x-text-input id="kategori_imt" type="text" name="kategori_imt" class="mt-1 block w-full" value="{{ old('kategori_imt') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('kategori_imt')" />
                        </div>
                        <br>

                        <div class="max-w-xl">
                            <x-input-label for="rentan_imt" value="Rentan IMT" />
                            <x-text-input id="rentan_imt" type="text" name="rentan_imt" class="mt-1 block w-full" value="{{ old('rentan_imt') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('rentan_imt')" />
                        </div>
                        <br>

                        <div class="max-w-xl">
                            <x-input-label for="keterangan" value="Keterangan" />
                            <x-text-input id="keterangan" type="text" name="keterangan" class="mt-1 block w-full" value="{{ old('keterangan') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                        </div>
                        <br> 

                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                        <x-secondary-button tag="a" href="{{ route('SistemPakar.admin.kelola_dm.imt') }}">Kembali</x-secondary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>