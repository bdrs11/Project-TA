<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Rekomendasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Notifikasi --}}
                    @if(session('success'))
                        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">{{ session('success') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">{{ session('error') }}</div>
                    @endif

                    <form id="rekomendasi-form" action="{{ route('SistemPakar.admin.kelola_rekomendasi.update', $rekomendasi->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Pilih Rule --}}
                        <div class="max-w-xl mb-4">
                            <x-input-label for="rule_id" value="Pilih Aturan (Rule)" />
                            <select id="rule_id" name="rule_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach($rules as $rule)
                                    <option value="{{ $rule->id }}" {{ $rekomendasi->rule_id == $rule->id ? 'selected' : '' }}>
                                        {{ $rule->id }} - {{ $rule->keterangan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Pilih Makanan --}}
                        <div class="max-w-xl mb-4">
                            <x-input-label for="food_select" value="Pilih Makanan" />
                            <div class="flex gap-2">
                                <select id="food_select" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">-- Pilih Makanan --</option>
                                    @foreach($foods as $food)
                                        <option value="{{ $food->id }}">{{ $food->nama_makanan }}</option>
                                    @endforeach
                                </select>
                                <x-secondary-button type="button" onclick="tambahMakanan()">Tambah</x-secondary-button>
                            </div>
                        </div>

                        {{-- List makanan yang dipilih --}}
                        <div class="max-w-xl mb-4">
                            <x-input-label value="Makanan yang Dipilih" />
                            <ul id="selected-food-list" class="list-disc pl-5 mt-2 text-sm text-gray-800">
                                @foreach($rekomendasi->details as $detail)
                                    <li data-id="{{ $detail->food->id }}">
                                        {{ $detail->food->nama_makanan }}
                                        <button type="button" class="text-red-500 ml-2" onclick="hapusMakanan('{{ $detail->food->id }}')">Hapus</button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Input hidden makanan --}}
                        <div id="selected-food-inputs">
                            @foreach($rekomendasi->details as $detail)
                                <input type="hidden" name="food_id[]" value="{{ $detail->food->id }}" data-id="{{ $detail->food->id }}">
                            @endforeach
                        </div>

                        {{-- Keterangan --}}
                        <div class="max-w-xl mb-6">
                            <x-input-label for="keterangan" value="Keterangan" />
                            <x-text-input id="keterangan" type="text" name="keterangan" class="block w-full mt-1" value="{{ $rekomendasi->details->first()->keterangan ?? '' }}" />
                        </div>

                       
                        <x-primary-button>Ubah Data</x-primary-button>
                        <x-secondary-button tag="a" href="{{ route('SistemPakar.admin.kelola_rekomendasi') }}">Kembali</x-secondary-button>
                       
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- Script --}}
    @push('scripts')
    <script>
        let selectedFoods = Array.from(document.querySelectorAll('#selected-food-list li')).map(li => li.dataset.id);

        function tambahMakanan() {
            const select = document.getElementById('food_select');
            const foodId = select.value;
            const foodText = select.options[select.selectedIndex].text;

            if (foodId && !selectedFoods.includes(foodId)) {
                selectedFoods.push(foodId);

                // Tambah ke daftar tampilan
                const list = document.getElementById('selected-food-list');
                const li = document.createElement('li');
                li.setAttribute('data-id', foodId);
                li.innerHTML = `${foodText}
                    <button type="button" class="text-red-500 ml-2" onclick="hapusMakanan('${foodId}')">Hapus</button>`;
                list.appendChild(li);

                // Tambah input tersembunyi
                const inputContainer = document.getElementById('selected-food-inputs');
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'food_id[]';
                input.value = foodId;
                input.setAttribute('data-id', foodId);
                inputContainer.appendChild(input);
            }
        }

        function hapusMakanan(foodId) {
            selectedFoods = selectedFoods.filter(id => id !== foodId);

            const li = document.querySelector(`#selected-food-list li[data-id="${foodId}"]`);
            if (li) li.remove();

            const input = document.querySelector(`#selected-food-inputs input[data-id="${foodId}"]`);
            if (input) input.remove();
        }
    </script>
    @endpush
</x-app-layout>
