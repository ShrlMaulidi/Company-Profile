<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'PT Media Solusi Sukses' }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

        <style>
            body { font-family: 'Inter', sans-serif; }
            
            /* Custom CSS untuk Timeline dipindah kesini agar rapi */
            .timeline-item:before {
                content: '';
                position: absolute;
                top: 0;
                bottom: 0;
                width: 4px;
                background-color: #e5e7eb;
                left: 7px;
                margin-left: -2px;
            }
            .timeline-point {
                position: absolute;
                top: 0;
                left: 0;
                width: 16px;
                height: 16px;
                border-radius: 50%;
                background-color: #2563eb; /* Biru sesuai branding */
                z-index: 10;
            }
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="antialiased bg-white text-gray-800">
        
        {{-- Navbar Khusus Website Publik --}}
        @livewire('navbar')

        {{-- Slot Utama: Disini konten halaman welcome akan masuk --}}
        <main>
            {{ $slot }}
        </main>

        {{-- Footer Global bisa ditaruh disini nanti --}}
        <footer class="bg-gray-900 text-white py-10 mt-20 text-center">
            <p>&copy; {{ date('Y') }} PT Media Solusi Sukses. All rights reserved.</p>
        </footer>

        {{-- Floating Action Button (Global) --}}
        <div class="fixed bottom-8 right-8 z-50">
            <button class="w-14 h-14 bg-blue-700 rounded-full shadow-2xl flex items-center justify-center text-white hover:scale-105 transition-transform duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300/50">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                </svg>
            </button>
        </div>

        @livewireScripts
    </body>
</html>