<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menambahkan Aturan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('SistemPakar.admin.kelola_aturan.store') }}" method="POST">
                        @csrf

                        {{-- User ID (otomatis pakai user yang login) --}}
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                        {{-- Kategori Usia --}}
                        <div class="max-w-xl">
                            <x-input-label for="kategori_usia_id" value="Kategori Usia" />
                            <select name="kategori_usia_id" class="block w-full mt-1">
                                <option value="">-- Pilih Usia --</option>
                                @foreach($age_categories as $age)
                                    <option value="{{ $age->id }}">{{ $age->rentan_usia }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('kategori_usia_id')" class="mt-2" />
                        </div>

                        {{-- Kategori IMT --}}
                        <div class="max-w-xl mt-4">
                            <x-input-label for="kategori_imt_id" value="Kategori IMT" />
                            <select name="kategori_imt_id" class="block w-full mt-1">
                                <option value="">-- Pilih IMT --</option>
                                @foreach($imt_categories as $imt)
                                    <option value="{{ $imt->id }}">{{ $imt->rentan_imt }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('kategori_imt_id')" class="mt-2" />
                        </div>

                        {{-- Aktivitas Fisik --}}
                        <div class="max-w-xl mt-4">
                            <x-input-label for="aktivitas_fisik_id" value="Aktivitas Fisik" />
                            <select name="aktivitas_fisik_id" class="block w-full mt-1">
                                <option value="">-- Pilih Aktivitas --</option>
                                @foreach($activitys as $activity)
                                    <option value="{{ $activity->id }}">{{ $activity->kategori }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('aktivitas_fisik_id')" class="mt-2" />
                        </div>

                        {{-- Kategori Gula Darah --}}
                        <div class="max-w-xl mt-4">
                            <x-input-label for="sugar_categorie_id" value="Kategori Gula Darah" />
                            <select name="sugar_categorie_id" class="block w-full mt-1">
                                <option value="">-- Pilih Kategori Gula --</option>
                                @foreach($sugar_categories as $sugar)
                                    <option value="{{ $sugar->id }}">{{ $sugar->rentan }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('sugar_categorie_id')" class="mt-2" />
                        </div>

                        {{-- Keterangan --}}
                        <div class="max-w-xl mt-4">
                            <x-input-label for="keterangan" value="Keterangan" />
                            <x-text-input id="keterangan" type="text" name="keterangan" class="block w-full mt-1" value="{{ old('keterangan') }}" />
                            <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                        </div>

                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                        <x-secondary-button tag="a" href="{{ route('SistemPakar.admin.kelola_makanan') }}">Kembali</x-secondary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>