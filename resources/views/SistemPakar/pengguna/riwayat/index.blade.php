<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            Riwayat Konsultasi Pola Makan
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @forelse ($consultations as $item)
                @php
                    $imt = $item->tinggi_badan > 0
                        ? $item->berat_badan / pow($item->tinggi_badan / 100, 2)
                        : 0;

                    $kategori_imt = match(true) {
                        $imt < 18.5 => 'Kurus',
                        $imt >= 18.5 && $imt < 25 => 'Normal',
                        $imt >= 25 && $imt < 30 => 'Gemuk',
                        $imt >= 30 => 'Obesitas',
                        default => 'Tidak diketahui'
                    };
                @endphp

                <div class="bg-white shadow-sm sm:rounded-lg p-6 mb-6">
                    <form>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-medium">Usia</label>
                                <input type="text" readonly class="w-full border-gray-300 rounded-md"
                                    value="{{ $item->usiaKategori->rentan_usia ?? '-' }}">
                            </div>

                            <div>
                                <label class="block font-medium">Berat Badan</label>
                                <input type="text" readonly class="w-full border-gray-300 rounded-md"
                                    value="{{ $item->berat_badan }} kg">
                            </div>

                            <div>
                                <label class="block font-medium">Tinggi Badan</label>
                                <input type="text" readonly class="w-full border-gray-300 rounded-md"
                                    value="{{ $item->tinggi_badan }} cm">
                            </div>

                            <div>
                                <label class="block font-medium">Indeks Massa Tubuh (IMT)</label>
                                <input type="text" readonly class="w-full border-gray-300 rounded-md"
                                    value="{{ number_format($imt, 2) }} ({{ $kategori_imt }})">
                            </div>

                            <div>
                                <label class="block font-medium">Aktivitas Fisik</label>
                                <input type="text" readonly class="w-full border-gray-300 rounded-md"
                                    value="{{ $item->aktivitas->kategori ?? '-' }}">
                            </div>

                            <div>
                                <label class="block font-medium">Kadar Gula Darah</label>
                                <input type="text" readonly class="w-full border-gray-300 rounded-md"
                                    value="{{ $item->gulaDarah->rentan ?? '-' }}">
                            </div>
                        </div>

                        {{-- Rekomendasi Makanan --}}
                        <div class="mt-6">
                            <label class="block font-semibold mb-2">Rekomendasi Makanan:</label>

                            @if ($item->recommendation && $item->recommendation->detailRecommendations->count())
                                <ul class="list-disc pl-6 space-y-1">
                                    @foreach ($item->recommendation->detailRecommendations as $detail)
                                        <li>
                                            {{ $detail->food->nama_makanan ?? '-' }}
                                            @if($detail->keterangan)
                                                - {{ $detail->keterangan }}
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500 italic">Tidak ada data rekomendasi makanan.</p>
                            @endif
                        </div>
                    </form>
                </div>
            @empty
                <div class="text-center text-gray-500">Belum ada data konsultasi.</div>
            @endforelse
        </div>
    </div>
</x-app-layout>
