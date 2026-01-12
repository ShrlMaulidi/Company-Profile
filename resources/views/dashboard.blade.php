<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('mss.png') }}" type="image/png">
    <title>Dashboard Administrator</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <livewire:sidebaradmin />
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
            
            <header class="bg-white shadow-sm sticky top-0 z-10">
                <div class="px-6 py-4 flex justify-between items-center">
                    <h1 class="text-xl font-semibold text-gray-800">
                        {{-- Logika Judul Halaman Dinamis (Opsional) --}}
                        @if(request()->routeIs('dashboard')) Dashboard Overview
                        @elseif(request()->routeIs('admin.partners')) Data Partnership
                        @elseif(request()->routeIs('admin.packages')) Data Paket
                        @elseif(request()->routeIs('profile.edit')) Ubah Password / Profil
                        @endif
                    </h1>
                    <div class="text-sm text-gray-500">
                        Halo, {{ Auth::user()->name ?? 'Admin' }}
                    </div>
                </div>
            </header>

            <main class="w-full flex-grow p-6">
                
                @if(request()->routeIs('dashboard'))
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Selamat Datang di Admin Panel</h3>
                        <p class="text-gray-600">
                            Silakan pilih menu di sidebar sebelah kiri untuk mengelola data website:
                        </p>
                        <ul class="list-disc list-inside mt-4 text-gray-600 space-y-1">
                            <li><strong>Partnership:</strong> Kelola data partner.</li>
                            <li><strong>Kelola Paket:</strong> Tambah atau ubah harga paket produk.</li>
                            <li><strong>Ubah Password:</strong> Ganti kata sandi akun admin.</li>
                        </ul>
                    </div>
                @else
                    {{ $slot ?? '' }}
                @endif

            </main>
        </div>

    </div>

    @livewireScripts
</body>
</html>