<x-app-layout>

    @if(auth()->user()->role_id == 1)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <br>
    <div class="container mx-auto p-6">
        <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-blue-100 rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold text-gray-800">Total Makanan</h2>
                <p class="text-3xl">{{ $totalMakanan }}</p>
            </div>
            <div class="bg-green-100 rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold text-gray-800">Total Aturan</h2>
                <p class="text-3xl">{{ $totalRule }}</p>
            </div>
            <div class="bg-yellow-100 rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold text-gray-800">Total Rekomendasi</h2>
                <p class="text-3xl">{{ $totalRekomendasi }}</p>
            </div>
        </div>
        
        <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <div class="bg-purple-100 rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold text-gray-800">Staff Kepakaran</h2>
                <p class="text-3xl">{{ $totalAdmin }}</p>
            </div>
            <div class="bg-pink-100 rounded-lg p-4 shadow">
                <h2 class="text-xl font-semibold text-gray-800">Pengguna</h2>
                <p class="text-3xl">{{ $totalPengguna }}</p>
            </div>
        </div>
    </div>
     @endif

    @if(auth()->user()->role_id == 2)
        <x-slot name="header">
            <div class="w-full text-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('') }}
                </h2>
            </div>
        </x-slot>

        <style>
            .landing {
                background: radial-gradient(circle at center, #111 0%, #000 100%);
                color: white;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 4rem;
                border-radius: 10px;
            }

            .landing-text {
                max-width: 50%;
                font-family: 'Space Mono', monospace;
            }

            .landing-text h1 {
                font-size: 4rem;
                line-height: 1.2;
                margin: 0;
            }

            .landing-text p {
                font-size: 1.5rem;
                margin-top: 20px;
                color: #cccccc;
            }

            .landing-image {
                border: 2px solid #a0522d;
                background-color: #222;
                padding: 5px;
                max-width: 45%;
            }

            .landing-image img {
                width: 100%;
                border-radius: 5px;
            }

            @media (max-width: 768px) {
                .landing {
                    flex-direction: column;
                    text-align: center;
                }

                .landing-text, .landing-image {
                    max-width: 100%;
                }

                .landing-text h1 {
                    font-size: 2.5rem;
                }

                .landing-text p {
                    font-size: 1.2rem;
                }
            }
        </style>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="landing">
                <div class="landing-text">
                    <h1>Diabetes</h1>
                    <p>Adalah penyakit kronis (menahun) yang terjadi ketika tubuh tidak dapat memproduksi insulin secara cukup, atau tidak dapat menggunakan insulin secara efektif. Insulin adalah hormon yang membantu mengatur kadar gula (glukosa) dalam darah.</p>
                </div>
                <div class="landing-image">
                    <img src="{{ asset('landing.png') }}" alt="Gambar makanan sehat untuk diabetes">
                </div>
            </div>
        </div>
    @endif

</x-app-layout>
