<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased">
    <div class="h-screen flex bg-gray-100">

        {{-- Sidebar untuk Admin --}}
        @if(auth()->user()->role_id == 1)
            @include('layouts.sidebar')
        @endif

        {{-- Konten Utama --}}
        <div class="flex-1 flex flex-col overflow-hidden">

            {{-- Navbar atas hanya untuk pengguna --}}
            @if (auth()->user()->role_id == 2)
                @include('layouts.navigation')
            @endif

            {{-- Header halaman --}}
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            {{-- Konten halaman (scrollable) --}}
            <main class="flex-1 overflow-y-auto scroll-smooth px-4 py-4">
                {{ $slot }}
            </main>
        </div>   
    </div>
    {{-- SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- SweetAlert2 Notifikasi --}}
    <script>
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#3085d6'
            });
        @endif

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6'
            });
        @endif
    </script>
    @stack('scripts')
</body>
</html>
