<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            Riwayat Konsultasi
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            {{-- Form Filter Tanggal --}}
            <form method="GET" action="{{ route('SistemPakar.pengguna.riwayat') }}" class="mb-6 flex justify-end gap-2">
                <select name="tanggal" class="border-gray-300 rounded-md shadow-sm">
                    <option value="">-- Pilih Tanggal --</option>
                    @foreach ($semuaTanggal as $c)
                        <option value="{{ $c->created_at }}"
                            {{ request('tanggal') == $c->created_at ? 'selected' : '' }}>
                            {{ $c->created_at->format('d M Y H:i:s') }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Filter</button>
            </form>

            {{-- Konten Konsultasi --}}
            @forelse ($consultations as $item)
                @php
                    $imt = $item->tinggi_badan > 0
                        ? $item->berat_badan / pow($item->tinggi_badan / 100, 2)
                        : 0;

                    $kategori_imt = match(true) {
                        $imt < 18.5 => 'Kurus',
                        $imt >= 18.5 && $imt < 25 => 'Normal',
                        $imt >= 25 && $imt < 30 => 'Kelebihan Berat Badan',
                        $imt >= 30 => 'Obesitas',
                        default => 'Tidak diketahui',
                    };
                @endphp

                <div class="bg-white shadow-sm sm:rounded-lg p-6 mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium">Usia</label>
                            <input type="text" readonly class="w-full border-gray-300 rounded-md"
                                value="{{ $item->usiaKategori->rentan_usia ?? '-' }} tahun">
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
                                value="{{ $item->gulaDarah->rentan ?? '-' }} mg/dL">
                        </div>

                        {{-- <div>
                            <label class="block font-medium">Keterangan</label>
                            <input type="text" readonly class="w-full border-gray-300 rounded-md"
                                value="{{ $item->rule->keterangan ?? '-' }}">
                        </div> --}}
                    </div>

                    {{-- Rekomendasi Makanan --}}
                    <div class="mt-6">
                        <label class="block font-semibold mb-2 text-center">Rekomendasi Makanan:</label>

                        @if ($semuaMakanan->count())
                            <ul class="list-disc space-y-1 text-center">
                                @foreach ($semuaMakanan as $detail)
                                    <li class="list-none">
                                        {{ $detail->food->nama_makanan ?? '-' }}
                                        @if ($detail->keterangan)
                                            - {{ $detail->keterangan }}
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500 italic text-center">Tidak ada data rekomendasi makanan.</p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-500">Belum ada data konsultasi.</div>
            @endforelse
        </div>
    </div>
</x-app-layout>
