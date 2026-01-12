<div x-data="{ 
        activeDropdown: null, 
        scrolled: window.pageYOffset > 20, 
        mobileMenuOpen: false,
        darkMode: localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
        toggleTheme() {
            this.darkMode = !this.darkMode;
            if (this.darkMode) {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            }
        }
     }" 
     @scroll.window="scrolled = (window.pageYOffset > 20)"
     class="fixed top-0 left-0 right-0 z-50 font-sans transition-all duration-300 ease-in-out"
     :class="(scrolled || mobileMenuOpen) ? 'py-0' : 'py-2 lg:py-5'"
     x-cloak>
    
    <style> [x-cloak] { display: none !important; } </style>

    <div x-show="activeDropdown !== null || mobileMenuOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40"
         @click="activeDropdown = null; mobileMenuOpen = false"
         style="display: none;">
    </div>

    <nav class="mx-auto transition-all duration-300 ease-in-out relative z-50"
         :class="(scrolled || mobileMenuOpen)
            ? 'w-full rounded-none bg-gray-50 dark:bg-slate-900 shadow-md dark:shadow-slate-800 border-b border-gray-200 dark:border-gray-800' 
            : 'w-[95%] lg:max-w-[1320px] bg-white dark:bg-slate-900 rounded-xl lg:rounded-2xl shadow-lg dark:shadow-[0_10px_30px_rgba(255,255,255,0.05)] border border-white/50 dark:border-slate-800'">
            
        <div class="px-4 lg:px-8 flex justify-between items-center transition-all duration-300"
             :class="(scrolled || mobileMenuOpen) ? 'h-16 lg:h-[62px]' : 'h-12 lg:h-[63px]'">
            
            <div class="flex items-center flex-shrink-0 cursor-pointer">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
                <div class="relative overflow-hidden rounded-lg p-0.5 bg-transparent shrink-0">
                    <img src="/mss.png" alt="MSS Logo" class="h-8 lg:h-10 w-auto object-contain">
                    </div>
                    
                    <h1 class="text-[15px] lg:text-[17px] font-bold text-slate-800 dark:text-slate-100 tracking-tight leading-tight group-hover:text-blue-700 dark:group-hover:text-blue-400 transition-colors">
                        PT Media Solusi Sukses
                    </h1>
                </a>
            </div>
            
            <div class="hidden lg:flex items-center justify-center flex-1 space-x-1">
                @php
                    $linkClass = "px-4 py-2 rounded-full text-[14px] font-medium transition-all duration-200 ease-out";
                    $activeStyle = "bg-slate-50 text-black ";
                    $inactiveStyle = "text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50/80 dark:hover:bg-slate-800";
                @endphp

                <a href="{{ route('home') }}" class="{{ $linkClass }} {{ Request::routeIs('home') ? $activeStyle : $inactiveStyle }}">Beranda</a>

                <div @mouseenter="activeDropdown = 'profile'" @mouseleave="activeDropdown = null" class="relative h-full flex items-center">
                    <button class="{{ $linkClass }} flex items-center gap-1.5" :class="(activeDropdown === 'profile' || {{ Request::routeIs('profile.*') ? 'true' : 'false' }}) ? '{{ $activeStyle }}' : '{{ $inactiveStyle }}'">
                        <span>Profile</span>
                        <svg class="w-3 h-3 transition-transform duration-300" :class="{'rotate-180': activeDropdown === 'profile'}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="activeDropdown === 'profile'" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-3 scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         class="absolute top-full left-1/2 transform -translate-x-1/2 pt-6 w-[260px] z-50" 
                         style="display: none;">
                        <div class="relative bg-white dark:bg-slate-900 rounded-2xl shadow-[0_20px_60px_-15px_rgba(0,0,0,0.1)] border border-slate-100 dark:border-slate-800 p-2 overflow-hidden ring-1 ring-black/5">
                            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-blue-600"></div>
                            <div class="space-y-1 mt-2">
                                <a href="{{ route('profile.about') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 group transition-all duration-200 {{ Request::routeIs('profile.about') ? 'bg-blue-50 dark:bg-slate-800' : '' }}">
                                    <div class="w-8 h-8 rounded-lg {{ Request::routeIs('profile.about') ? 'bg-blue-600 text-white' : 'bg-blue-50 dark:bg-slate-800 text-blue-600 dark:text-blue-400' }} flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    </div>
                                    <span class="text-[13.5px] font-semibold {{ Request::routeIs('profile.about') ? 'text-blue-700 dark:text-blue-400' : 'text-slate-700 dark:text-slate-300' }} group-hover:text-blue-700 dark:group-hover:text-blue-400">Tentang Kami</span>
                                </a>
                                <a href="{{ route('profile.structure') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 group transition-all duration-200 {{ Request::routeIs('profile.structure') ? 'bg-blue-50 dark:bg-slate-800' : '' }}">
                                    <div class="w-8 h-8 rounded-lg {{ Request::routeIs('profile.structure') ? 'bg-blue-600 text-white' : 'bg-blue-50 dark:bg-slate-800 text-blue-600 dark:text-blue-400' }} flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    </div>
                                    <span class="text-[13.5px] font-semibold {{ Request::routeIs('profile.structure') ? 'text-blue-700 dark:text-blue-400' : 'text-slate-700 dark:text-slate-300' }} group-hover:text-blue-700 dark:group-hover:text-blue-400">Struktur Organisasi</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div @mouseenter="activeDropdown = 'produk'" @mouseleave="activeDropdown = null" class="relative h-full flex items-center">
                    <button class="{{ $linkClass }} flex items-center gap-1.5" :class="(activeDropdown === 'produk' || {{ Request::routeIs('products.*') ? 'true' : 'false' }}) ? '{{ $activeStyle }}' : '{{ $inactiveStyle }}'">
                        <span>Produk</span>
                        <svg class="w-3 h-3 transition-transform duration-300" :class="{'rotate-180': activeDropdown === 'produk'}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="activeDropdown === 'produk'" 
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-3 scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                            class="absolute top-full left-1/2 transform -translate-x-1/2 pt-6 w-[260px] z-50" 
                            style="display: none;">
                        <div class="relative bg-white dark:bg-slate-900 rounded-2xl shadow-[0_20px_60px_-15px_rgba(0,0,0,0.1)] border border-slate-100 dark:border-slate-800 p-2 overflow-hidden ring-1 ring-black/5">
                            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-blue-600"></div>
                            <div class="space-y-1 mt-2">
                                <a href="{{ route('products.home') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 group transition-all duration-200 {{ Request::routeIs('products.home') ? 'bg-blue-50 dark:bg-slate-800' : '' }}">
                                    <div class="w-8 h-8 rounded-lg {{ Request::routeIs('products.home') ? 'bg-blue-600 text-white' : 'bg-blue-50 dark:bg-slate-800 text-blue-600 dark:text-blue-400' }} flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                    </div>
                                    <span class="text-[13.5px] font-semibold {{ Request::routeIs('products.home') ? 'text-blue-700 dark:text-blue-400' : 'text-slate-700 dark:text-slate-300' }} group-hover:text-blue-700 dark:group-hover:text-blue-400">Home</span>
                                </a>
                                <a href="{{ route('products.business') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 group transition-all duration-200 {{ Request::routeIs('products.business') ? 'bg-blue-50 dark:bg-slate-800' : '' }}">
                                    <div class="w-8 h-8 rounded-lg {{ Request::routeIs('products.business') ? 'bg-blue-600 text-white' : 'bg-blue-50 dark:bg-slate-800 text-blue-600 dark:text-blue-400' }} flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <span class="text-[13.5px] font-semibold {{ Request::routeIs('products.business') ? 'text-blue-700 dark:text-blue-400' : 'text-slate-700 dark:text-slate-300' }} group-hover:text-blue-700 dark:group-hover:text-blue-400">Business</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('partnership') }}" class="{{ $linkClass }} {{ Request::routeIs('partnership') ? $activeStyle : $inactiveStyle }}">Partnerships</a>
                <a href="{{ route('coverage') }}" class="{{ $linkClass }} {{ Request::routeIs('coverage') ? $activeStyle : $inactiveStyle }}">Area Jangkauan</a>
                <a href="{{ route('contact') }}" class="{{ $linkClass }} {{ Request::routeIs('contact') ? $activeStyle : $inactiveStyle }}">Kontak</a>
            </div>
            
            <div class="hidden lg:flex items-center h-full lg:ml-4">
                <button @click="toggleTheme()" 
                        class="p-2.5 rounded-full text-slate-500 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-800 transition-all focus:outline-none"
                        :title="darkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode'">
                    
                    <svg x-show="darkMode" class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>

                    <svg x-show="!darkMode" class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                </button>
            </div>

            <div class="lg:hidden flex items-center gap-2">
                 <button @click="mobileMenuOpen = !mobileMenuOpen" 
                         class="p-2 text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-all focus:outline-none group">
                    <svg x-show="!mobileMenuOpen" class="w-7 h-7 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    <svg x-show="mobileMenuOpen" class="w-7 h-7 text-blue-600 dark:text-blue-400 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>

        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="lg:hidden absolute left-0 right-0 top-full bg-white dark:bg-slate-900 shadow-xl border-t border-gray-100 dark:border-slate-800 overflow-hidden rounded-b-2xl z-40"
             style="display: none;">
            
            <div class="p-4 space-y-2 max-h-[75vh] overflow-y-auto">
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl font-semibold text-[15px] transition-colors {{ Request::routeIs('home') ? 'bg-blue-600 text-white' : 'text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-800' }}">
                    Beranda
                </a>
                
                <div x-data="{ open: {{ Request::routeIs('profile.*') ? 'true' : 'false' }} }" class="space-y-1">
                    <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-3 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-700 dark:text-slate-200 font-semibold text-[15px] transition-colors group">
                        <span class="{{ Request::routeIs('profile.*') ? 'text-blue-600 dark:text-blue-400' : 'group-hover:text-blue-700 dark:group-hover:text-blue-400' }} transition-colors">Profile</span>
                        <div class="w-8 h-8 rounded-full bg-slate-50 dark:bg-slate-800 flex items-center justify-center group-hover:bg-blue-100 dark:group-hover:bg-slate-700 transition-colors">
                            <svg class="w-4 h-4 text-slate-500 dark:text-slate-400 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-transform duration-300" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </button>
                    <div x-show="open" x-collapse class="px-2 pb-2 space-y-1">
                        <a href="{{ route('profile.about') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ Request::routeIs('profile.about') ? 'text-blue-700 dark:text-blue-400 bg-blue-50 dark:bg-slate-800' : 'text-slate-600 dark:text-slate-400 hover:text-blue-700 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-slate-800' }}">Tentang Kami</a>
                        <a href="{{ route('profile.structure') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ Request::routeIs('profile.structure') ? 'text-blue-700 dark:text-blue-400 bg-blue-50 dark:bg-slate-800' : 'text-slate-600 dark:text-slate-400 hover:text-blue-700 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-slate-800' }}">Struktur Organisasi</a>
                    </div>
                </div>

                <div x-data="{ open: {{ Request::routeIs('products.*') ? 'true' : 'false' }} }" class="space-y-1">
                    <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-3 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-700 dark:text-slate-200 font-semibold text-[15px] transition-colors group">
                        <span class="{{ Request::routeIs('products.*') ? 'text-blue-600 dark:text-blue-400' : 'group-hover:text-blue-700 dark:group-hover:text-blue-400' }} transition-colors">Produk</span>
                        <div class="w-8 h-8 rounded-full bg-slate-50 dark:bg-slate-800 flex items-center justify-center group-hover:bg-blue-100 dark:group-hover:bg-slate-700 transition-colors">
                            <svg class="w-4 h-4 text-slate-500 dark:text-slate-400 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-transform duration-300" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </button>
                    <div x-show="open" x-collapse class="px-2 pb-2 space-y-1">
                        <a href="{{ route('products.home') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ Request::routeIs('products.home') ? 'text-blue-700 dark:text-blue-400 bg-blue-50 dark:bg-slate-800' : 'text-slate-600 dark:text-slate-400 hover:text-blue-700 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-slate-800' }}">Home</a>
                        <a href="{{ route('products.business') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ Request::routeIs('products.business') ? 'text-blue-700 dark:text-blue-400 bg-blue-50 dark:bg-slate-800' : 'text-slate-600 dark:text-slate-400 hover:text-blue-700 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-slate-800' }}">Business</a>
                    </div>
                </div>

                <a href="{{ route('partnership') }}" class="block px-4 py-3 rounded-xl font-semibold text-[15px] transition-colors {{ Request::routeIs('partnership') ? 'bg-blue-600 text-white' : 'text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-800' }}">Partnerships</a>
                <a href="{{ route('coverage') }}" class="block px-4 py-3 rounded-xl font-semibold text-[15px] transition-colors {{ Request::routeIs('coverage') ? 'bg-blue-600 text-white' : 'text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-800' }}">Area Jangkauan</a>
                <a href="{{ route('contact') }}" class="block px-4 py-3 rounded-xl font-semibold text-[15px] transition-colors {{ Request::routeIs('contact') ? 'bg-blue-600 text-white' : 'text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-800' }}">Kontak</a>
                
                <div class="pt-4 mt-2 border-t border-gray-100 dark:border-slate-800 flex items-center justify-between px-4 pb-2">
                    <span class="text-xs font-bold text-slate-400 dark:text-slate-500 px-1 uppercase tracking-wider">Appearance</span>
                    <button @click="toggleTheme()" class="flex items-center gap-2 px-4 py-2 bg-slate-100 dark:bg-slate-800 rounded-lg text-sm font-semibold text-slate-600 dark:text-slate-300 transition-all">
                        <span x-text="darkMode ? 'Dark Mode' : 'Light Mode'"></span>
                        <svg x-show="darkMode" class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <svg x-show="!darkMode" class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</div>