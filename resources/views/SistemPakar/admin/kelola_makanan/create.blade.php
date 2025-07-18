<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menambahkan Makanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('SistemPakar.admin.kelola_makanan.store') }}" method="POST">
                        @csrf

                        <div class="max-w-xl">
                            <x-input-label for="nama_makanan" value="Nama Makanan" />
                            <x-text-input id="nama_makanan" type="text" name="nama_makanan" class="mt-1 block w-full" value="{{ old('nama_makanan') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_makanan')" />
                        </div>
                        <br>

                        <div class="max-w-xl">
                            <x-input-label for="nama_kategori" value="Kategori" />
                            <select id="nama_kategori" name="food_categorie_id" class="mt-1 block w-full">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($food_categories as $food_categorie)
                                    <option value="{{ $food_categorie->id }}" {{ old('food_categorie_id') == $food_categorie->id ? 'selected' : '' }}>
                                        {{ $food_categorie->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('food_categorie_id')" />
                        </div>


                        {{-- <div class="max-w-xl">
                            <x-input-label for="kategori" value="Kategori" />
                            <x-text-input id="kategori" type="text" name="kategori" class="mt-1 block w-full" value="{{ old('kategori') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('kategori')" />
                        </div>
                        <br> --}}

                        {{-- <div class="max-w-xl">
                            <x-input-label for="phone_number" value="Nomor Perusahaan" />
                            <x-text-input id="phone_number" type="text" name="phone_number" class="mt-1 block w-full" value="{{ old('phone_number') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                        </div>
                        <br> --}}

                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                        <x-secondary-button tag="a" href="{{ route('SistemPakar.admin.kelola_makanan') }}">Kembali</x-secondary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>