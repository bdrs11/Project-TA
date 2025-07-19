<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menambahkan Usia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('SistemPakar.admin.kelola_dm.usia.store') }}" method="POST">
                        @csrf

                        <div class="max-w-xl">
                            <x-input-label for="kelompok_usia" value="Kelompok Usia" />
                            <x-text-input id="kelompok_usia" type="text" name="kelompok_usia" class="mt-1 block w-full" value="{{ old('kelompok_usia') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('kelompok_usia')" />
                        </div>
                        <br>

                        <div class="max-w-xl">
                            <x-input-label for="rentan_usia" value="Rentan Usia" />
                            <x-text-input id="rentan_usia" type="text" name="rentan_usia" class="mt-1 block w-full" value="{{ old('rentan_usia') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('rentan_usia')" />
                        </div>
                        <br>

                        <div class="max-w-xl">
                            <x-input-label for="keterangan" value="Keterangan" />
                            <x-text-input id="keterangan" type="text" name="keterangan" class="mt-1 block w-full" value="{{ old('keterangan') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                        </div>
                        <br> 

                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                        <x-secondary-button tag="a" href="{{ route('SistemPakar.admin.kelola_dm.usia') }}">Kembali</x-secondary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>