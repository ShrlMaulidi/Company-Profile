<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'PT Media Solusi Sukses' }}</title>
        <link rel="icon" href="{{ asset('mss.png') }}" type="image/png">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

        <style>
            body { font-family: 'Inter', sans-serif; }
            
            /* Timeline Styles */
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
                background-color: #2563eb;
                z-index: 10;
            }
            /* Dark mode override untuk timeline line */
            .dark .timeline-item:before {
                background-color: #374151;
            }

            .chat-scroll::-webkit-scrollbar {
                width: 6px;
            }
            .chat-scroll::-webkit-scrollbar-track {
                background: transparent;
            }
            .chat-scroll::-webkit-scrollbar-thumb {
                background-color: #cbd5e1;
                border-radius: 20px;
            }
            .dark .chat-scroll::-webkit-scrollbar-thumb {
                background-color: #475569;
            }
        </style>
        <script>
            if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>
    </head>
    
    <body class="antialiased bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-300">
        
        @livewire('navbar')

        <main>
            {{ $slot }}
        </main>

        @livewire('contact-form')
        @include('components.home.footer')

        <button 
            x-data="{ showScroll: false }"
            @scroll.window="showScroll = window.scrollY > 300"
            x-show="showScroll"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-10 scale-90"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-10 scale-90"
            @click="window.scrollTo({top: 0, behavior: 'smooth'})"
            class="fixed bottom-28 right-9 z-40 p-3 rounded-full shadow-[0_4px_14px_0_rgba(0,0,0,0.2)] bg-gray-800 text-white dark:bg-gray-100 dark:text-gray-900 hover:bg-blue-600 dark:hover:bg-blue-500 dark:hover:text-white transition-all duration-300 focus:outline-none ring-1 ring-white/20"
            style="display: none;"
            aria-label="Back to top"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18" />
            </svg>
        </button>

        <div x-data="{ open: false }" class="fixed bottom-8 right-8 z-50 flex flex-col items-end font-sans">

            <div 
                x-show="open"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-10 scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                x-transition:leave-end="opacity-0 translate-y-10 scale-95"
                class="mb-4 w-[350px] h-[500px] flex flex-col bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-100 dark:border-gray-700 overflow-hidden ring-1 ring-black/5"
                style="display: none;"
            >
                <div class="bg-gradient-to-r from-blue-700 to-blue-600 p-4 flex-none flex items-center justify-between shadow-md relative z-10">
                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-white font-bold border border-white/30 backdrop-blur-sm">
                                CS
                            </div>
                            <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 border-2 border-blue-600 rounded-full animate-pulse"></span>
                        </div>
                        <div class="text-white">
                            <h3 class="font-bold text-sm tracking-wide">Asisten Virtual</h3>
                            <p class="text-[11px] text-blue-100 opacity-90">PT Media Solusi Sukses</p>
                        </div>
                    </div>
                    <button @click="open = false" class="text-white/80 hover:text-white transition p-1 hover:bg-white/10 rounded-full">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <div class="flex-1 overflow-hidden relative w-full bg-white dark:bg-gray-800">
                    @livewire('chat-widget')
                </div>

            </div>

            <button 
                @click="open = !open" 
                :class="open ? 'rotate-90 bg-gray-700 dark:bg-gray-600' : 'bg-blue-700 dark:bg-blue-600 hover:scale-110'"
                class="group w-14 h-14 rounded-full shadow-[0_4px_14px_0_rgba(37,99,235,0.39)] flex items-center justify-center text-white transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300/50"
            >
                <svg x-show="!open" class="w-7 h-7 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                </svg>

                <svg x-show="open" style="display: none;" class="w-7 h-7 transition-transform duration-300 rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        @livewireScripts
    </body>
</html>