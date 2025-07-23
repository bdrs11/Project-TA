<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menambahkan Rekomendasi') }}
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

                    <form id="rekomendasi-form" action="{{ route('SistemPakar.admin.kelola_rekomendasi.store') }}" method="POST">
                        @csrf

                        {{-- Pilih Rule --}}
                        <div class="max-w-xl">
                            <x-input-label for="rule_id" value="Pilih Aturan (Rule)" />
                            <select id="rule_id" name="rule_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="">-- Pilih Rule --</option>
                                @foreach($rules as $rule)
                                    <option value="{{ $rule->id }}" {{ old('rule_id') == $rule->id ? 'selected' : '' }}>
                                        {{ $rule->id }} - {{ $rule->keterangan }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('rule_id')" />
                        </div>

                        <br>

                        {{-- Pilih Makanan --}}
                        <div class="max-w-xl">
                            <x-input-label for="food_select" value="Pilih Makanan" />
                            <select id="food_select" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Pilih Makanan --</option>
                                @foreach($foods as $food)
                                    <option value="{{ $food->id }}">{{ $food->nama_makanan }}</option>
                                @endforeach
                            </select>
                            <x-secondary-button type="button" class="mt-2" onclick="tambahMakanan()">Tambah</x-secondary-button>
                        </div>

                        <br>

                        {{-- List makanan yang dipilih --}}
                        <div class="max-w-xl mt-4">
                            <x-input-label value="Makanan yang Dipilih" />
                            <ul id="selected-food-list" class="list-disc pl-5 mt-2 text-sm text-gray-800"></ul>
                        </div>

                        {{-- Input hidden untuk makanan yang akan dikirim --}}
                        <div id="selected-food-inputs"></div>

                        {{-- Catatan --}}
                        <div class="max-w-xl mt-4">
                            <x-input-label for="keterangan" value="Keterangan" />
                            <x-text-input id="keterangan" type="text" name="keterangan" class="block w-full mt-1" value="{{ old('keterangan') }}" />
                            <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                        </div>

                        <br>

                        <x-primary-button>Simpan</x-primary-button>
                        <x-secondary-button tag="a" href="{{ route('SistemPakar.admin.kelola_rekomendasi') }}">Kembali</x-secondary-button>
                    </form>

                    {{-- Script langsung di bawah form --}}
                    <script>
                        let selectedFoods = [];

                        function tambahMakanan() {
                            const select = document.getElementById('food_select');
                            const foodId = select.value;
                            const foodText = select.options[select.selectedIndex]?.text;

                            if (!foodId || selectedFoods.includes(foodId)) return;

                            selectedFoods.push(foodId);

                            // Tambah ke daftar
                            const list = document.getElementById('selected-food-list');
                            const li = document.createElement('li');
                            li.className = "mb-1";
                            li.innerHTML = `
                                ${foodText}
                                <button type="button" class="text-red-500 text-xs ml-2 hover:underline" onclick="hapusMakanan('${foodId}', this)">hapus</button>
                            `;
                            li.setAttribute('data-id', foodId);
                            list.appendChild(li);

                            // Tambah input hidden
                            const inputContainer = document.getElementById('selected-food-inputs');
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = 'food_id[]';
                            input.value = foodId;
                            input.id = 'food_input_' + foodId;
                            inputContainer.appendChild(input);
                        }

                        function hapusMakanan(foodId, buttonElement) {
                            selectedFoods = selectedFoods.filter(id => id !== foodId);

                            const li = buttonElement.closest('li');
                            if (li) li.remove();

                            const input = document.getElementById('food_input_' + foodId);
                            if (input) input.remove();
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
