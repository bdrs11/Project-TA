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
                    <form method="post" action="{{ route('SistemPakar.admin.kelola_dm.af.update', $activity->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')
                        <div class="max-w-xl">
                            <x-input-label for="kategori" value="Kategori" />
                            <x-text-input id="kategori" type="text" name="kategori" class="mt-1 block w-full" value="{{ old('kategori', $activity->kategori) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('kategori')" />
                        </div>

                        {{-- <div class="max-w-xl">
                            <x-input-label for="rentan_usia" value="Rentan Usia" />
                            <x-text-input id="rentan_usia" type="text" name="rentan_usia" class="mt-1 block w-full" value="{{ old('rentan_usia', $age_categorie->rentan_usia) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('rentan_usia')" />
                        </div> --}}

                        <div class="max-w-xl">
                            <x-input-label for="keterangan" value="Keterangan" />
                            <x-text-input id="keterangan" type="text" name="keterangan" class="mt-1 block w-full" value="{{ old('keterangan', $activity->keterangan) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                        </div>

                        <x-primary-button value="true">Ubah Data</x-primary-button>
                        <x-secondary-button tag="a" href="{{ route('SistemPakar.admin.kelola_dm.af') }}">Kembali</x-secondary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>