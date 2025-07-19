<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflowhidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('SistemPakar.admin.kelola_dm.usia.update', $age_categorie->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')
                        <div class="max-w-xl">
                            <x-input-label for="kelompok_usia" value="Kelompok Usia" />
                            <x-text-input id="kelompok_usia" type="text" name="kelompok_usia" class="mt-1 block w-full" value="{{ old('kelompok_usia', $age_categorie->kelompok_usia) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('kelompok_usia')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="rentan_usia" value="Rentan Usia" />
                            <x-text-input id="rentan_usia" type="text" name="rentan_usia" class="mt-1 block w-full" value="{{ old('rentan_usia', $age_categorie->rentan_usia) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('rentan_usia')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="keterangan" value="Keterangan" />
                            <x-text-input id="keterangan" type="text" name="keterangan" class="mt-1 block w-full" value="{{ old('keterangan', $age_categorie->keterangan) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                        </div>

                        <x-primary-button value="true">Ubah Data</x-primary-button>
                        <x-secondary-button tag="a" href="{{ route('SistemPakar.admin.kelola_dm.usia') }}">Kembali</x-secondary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>