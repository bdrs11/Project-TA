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
                    <form method="post" action="{{ route('SistemPakar.admin.kelola_aturan.update', $rule->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')

                        <div class="max-w-xl">
                            <x-input-label for="rentan_usia" value="Kategori Usia" />
                            <select id="rentan_usia" name="kategori_usia_id" class="mt-1 block w-full">
                                <option value="">-- Pilih Usia --</option>
                                @foreach($age_categories as $age)
                                    <option value="{{ $age->id }}" {{ old('kategori_usia_id', $age->kategori_usia_id) == $age->id ? 'selected' : '' }}>
                                        {{ $age->rentan_usia }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('kategori_usia_id')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="rentan_imt" value="Kategori IMT" />
                            <select id="rentan_imt" name="kategori_imt_id" class="mt-1 block w-full">
                                <option value="">-- Pilih IMT --</option>
                                @foreach($imt_categories as $imt)
                                    <option value="{{ $imt->id }}" {{ old('kategori_imt_id', $imt->kategori_imt_id) == $imt->id ? 'selected' : '' }}>
                                        {{ $imt->rentan_imt }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('kategori_imt_id')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="kategori" value="Aktivitas Fisik" />
                            <select id="kategori" name="aktivitas_fisik_id" class="mt-1 block w-full">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($activitys as $activity)
                                    <option value="{{ $activity->id }}" {{ old('aktivitas_fisik_id', $activity->aktivitas_fisik_id) == $activity->id ? 'selected' : '' }}>
                                        {{ $activity->kategori }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('aktivitas_fisik_id')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="rentan" value="Kategori Gula Darah" />
                            <select id="rentan" name="sugar_categorie_id" class="mt-1 block w-full">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($sugar_categories as $sugar)
                                    <option value="{{ $sugar->id }}" {{ old('sugar_categorie_id', $sugar->sugar_categorie_id) == $sugar->id ? 'selected' : '' }}>
                                        {{ $sugar->rentan }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('sugar_categorie_id')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="keterangan" value="Keterangan" />
                            <x-text-input id="keterangan" type="text" name="keterangan" class="mt-1 block w-full" value="{{ old('keterangan', $rule->keterangan) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('keterangan')" />
                        </div>

                        <x-primary-button value="true">Ubah Data</x-primary-button>
                        <x-secondary-button tag="a" href="{{ route('SistemPakar.admin.kelola_aturan') }}">Kembali</x-secondary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>