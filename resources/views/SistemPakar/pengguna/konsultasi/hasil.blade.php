<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            Hasil Rekomendasi Pola Makan
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <p><strong>Usia:</strong> {{ $rule->ageCategory->rentan_usia }}</p>
                    <p><strong>Berat Badan:</strong> {{ $berat }}</p>
                    <p><strong>Tinggi Badan:</strong> {{ $tinggi }}</p>
                    <p><strong>IMT Anda:</strong> {{ $imt }}</p>
                    <p><strong>Aktivitas Fisik:</strong> {{ $rule->activity->kategori }}</p>
                    <p><strong>Kaadar Gula Darah:</strong> {{ $rule->sugarCategory->rentan }}</p>
                    <p><strong>Keterangan:</strong> {{ $rule->keterangan }}</p>

                    <h3 class="mt-4 font-semibold">Rekomendasi Makanan:</h3>
                    <ul class="list-disc ml-6 mt-2">
                        @foreach ($detail_rekomendasi as $detail)
                            <li>
                                {{ $detail->food->nama_makanan }} 
                                @if($detail->keterangan)
                                    - {{ $detail->keterangan }}
                                @endif
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-6">
                        <a href="{{ route('SistemPakar.pengguna.konsultasi') }}" class="text-blue-600 hover:underline">Kembali ke Form</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
