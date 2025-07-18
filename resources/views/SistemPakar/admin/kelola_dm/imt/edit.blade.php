<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflowhidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('SistemPakar.admin.kelola_dm.imt.update', $imt_categorie->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')
                        <div class="max-w-xl">
                            <x-input-label for="kategori_imt" value="Kategori IMT" />
                            <x-text-input id="kategori_imt" type="text" name="kategori_imt" class="mt-1 block w-full" value="{{ old('kategori_imt', $imt_categorie->kategori_imt) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('kategori_imt')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="rentan_imt" value="Rentan IMT" />
                            <x-text-input id="rentan_imt" type="text" name="rentan_imt" class="mt-1 block w-full" value="{{ old('rentan_imt', $imt_categorie->rentan_imt) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('rentan_imt')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="keterangan" value="Keterangan" />
                            <x-text-input id="keterangan" type="text" name="keterangan" class="mt-1 block w-full" value="{{ old('keterangan', $imt_categorie->keterangan) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                        </div>

                        <x-primary-button value="true">Ubah Data</x-primary-button>
                        <x-secondary-button tag="a" href="{{ route('SistemPakar.admin.kelola_dm.imt') }}">Kembali</x-secondary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>