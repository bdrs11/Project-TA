<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            Hasil Konsultasi
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Awal Form -->
                    <form action="#" method="POST">
                        @csrf
                        <!-- Jika ingin dikirim, sesuaikan action dan method -->

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-medium">Usia</label>
                                <input type="text" readonly class="w-full border-gray-300 rounded-md" value="{{ $rule->ageCategory->rentan_usia }} tahun">
                            </div>

                            <div>
                                <label class="block font-medium">Berat Badan</label>
                                <input type="text" readonly class="w-full border-gray-300 rounded-md" value="{{ $berat }} kg">
                            </div>

                            <div>
                                <label class="block font-medium">Tinggi Badan</label>
                                <input type="text" readonly class="w-full border-gray-300 rounded-md" value="{{ $tinggi }} cm">
                            </div>

                            <div>
                                <label class="block font-medium">IMT Anda</label>
                                <input type="text" readonly class="w-full border-gray-300 rounded-md" value="{{ $imt }}">
                            </div>

                            <div>
                                <label class="block font-medium">Aktivitas Fisik</label>
                                <input type="text" readonly class="w-full border-gray-300 rounded-md" value="{{ $rule->activity->kategori }}">
                            </div>

                            <div>
                                <label class="block font-medium">Kadar Gula Darah</label>
                                <input type="text" readonly class="w-full border-gray-300 rounded-md" value="{{ $rule->sugarCategory->rentan }} mg/dL">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block font-medium">Keterangan</label>
                                <textarea readonly class="w-full border-gray-300 rounded-md" rows="2">{{ $rule->keterangan }}</textarea>
                            </div>
                        </div>

                        <div class="mt-6 text-center">
                            <label class="block font-semibold mb-2">Rekomendasi Makanan:</label>
                            
                            <div class="inline-block text-left">
                                <ul class="list-disc pl-6">
                                    @foreach ($detail_rekomendasi as $detail)
                                        <li>
                                            {{ $detail->food->nama_makanan }} 
                                            @if($detail->keterangan)
                                                - {{ $detail->keterangan }}
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <div class="flex justify-end mt-6">
                            <a href="{{ route('SistemPakar.pengguna.konsultasi') }}" class="text-blue-600 hover:underline font-semibold">
                                Kembali
                            </a>
                        </div>

                    </form>
                    <!-- Akhir Form -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
