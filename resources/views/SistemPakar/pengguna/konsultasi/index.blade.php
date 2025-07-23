<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Konsultasi Pola Makan') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('SistemPakar.pengguna.konsultasi.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            {{-- Rentang Usia --}}
                            <div>
                                <x-input-label for="usia" value="Berapa rentang usia anda?" />
                                <select name="usia" id="usia" class="mt-1 block w-full rounded-md shadow-sm">
                                    <option value="">-- Pilih Usia --</option>
                                    @foreach ($age_categories as $usia)
                                        <option value="{{ $usia->id }}">{{ $usia->kelompok_usia }} ({{ $usia->rentan_usia }})</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('usia')" class="mt-2" />
                            </div>

                            {{-- Aktivitas Fisik --}}
                            <div>
                                <x-input-label for="aktivitas_fisik" value="Aktivitas fisik anda dalam sehari-hari?" />
                                <select name="aktivitas_fisik" id="aktivitas_fisik" class="mt-1 block w-full rounded-md shadow-sm">
                                    <option value="">-- Pilih Aktivitas Fisik --</option>
                                    @foreach ($activitys as $aktivitas)
                                        <option value="{{ $aktivitas->id }}">{{ $aktivitas->kategori }} </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('aktivitas_fisik')" class="mt-2" />
                            </div>

                            {{-- Berat Badan --}}
                            <div>
                                <x-input-label for="berat_badan" value="Berapa berat badan anda? (kg)" />
                                <x-text-input type="number" step="0.1" name="berat_badan" id="berat_badan" class="mt-1 block w-full" value="{{ old('berat_badan') }}" />
                                <x-input-error :messages="$errors->get('berat_badan')" class="mt-2" />
                            </div>

                            {{-- Kadar Gula Darah --}}
                            <div>
                                <x-input-label for="gula_darah" value="Berapa kadar gula darah terakhir anda?" />
                                <select name="gula_darah" id="gula_darah" class="mt-1 block w-full rounded-md shadow-sm">
                                    <option value="">-- Pilih Rentang Gula Darah --</option>
                                    @foreach ($sugar_categories as $gula)
                                        <option value="{{ $gula->id }}">{{ $gula->kategori }}  ({{ $gula->rentan }})</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('gula_darah')" class="mt-2" />
                            </div>

                            {{-- Tinggi Badan --}}
                            <div>
                                <x-input-label for="tinggi_badan" value="Berapa tinggi badan anda? (cm)" />
                                <x-text-input type="number" step="1" name="tinggi_badan" id="tinggi_badan" class="mt-1 block w-full" value="{{ old('tinggi_badan') }}" />
                                <x-input-error :messages="$errors->get('tinggi_badan')" class="mt-2" />
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="mt-6 text-right">
                            <x-primary-button type="submit">Selanjutnya</x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
