<div x-data="{ activeDropdown: null, scrolled: false }" 
     @scroll.window="scrolled = (window.pageYOffset > 20)"
     class="fixed top-0 left-0 right-0 z-50 font-sans transition-all duration-500 ease-in-out"
     :class="scrolled ? 'py-0 px-0' : 'py-6 px-4'">
    
    <div x-show="activeDropdown !== null"
         x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40"
         style="display: none;">
    </div>

    <nav class="mx-auto bg-[#F6F6F6] backdrop-blur-md transition-all duration-500 ease-in-out relative z-50"
         :class="scrolled 
            ? 'max-w-full rounded-none shadow-md border-b border-gray-200 px-6 lg:px-12' 
            : 'max-w-[1450px] rounded-[20px] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/20 px-6 lg:px-8'">
            
        <div class="flex justify-between items-center transition-all duration-500"
             :class="scrolled ? 'h-[65px]' : 'h-[72px]'">
            
            <div class="flex items-center flex-shrink-0 cursor-pointer mr-4 lg:mr-12">
                <a href="/" class="flex items-center gap-3 group">
                    <div class="relative overflow-hidden rounded-lg p-1 bg-white transition-transform group-hover:scale-105 duration-300">
                        <img src="/mss.png" alt="MSS Logo" class="h-10 w-auto object-contain">
                    </div>
                    
                    <h1 class="text-[17px] font-bold text-slate-800 tracking-tight whitespace-nowrap group-hover:text-blue-700 transition-colors">
                        PT Media Solusi Sukses
                    </h1>
                </a>
            </div>
            
            <div class="hidden lg:flex items-center justify-center flex-1 space-x-1">
                
                @php
                    $linkClass = "px-4 py-2 rounded-full text-[14px] font-medium text-slate-600 hover:text-blue-600 hover:bg-blue-50/80 transition-all duration-300 ease-out";
                    $btnClass  = "relative px-4 py-2 rounded-full flex items-center gap-1.5 text-[14px] font-medium transition-all duration-300 ease-out";
                    $activeStyle = "bg-blue-50 text-blue-700 shadow-sm ring-1 ring-blue-100";
                    $inactiveStyle = "text-slate-600 hover:text-blue-600 hover:bg-blue-50/80";
                @endphp

                <a href="/" class="{{ $linkClass }}">Beranda</a>

                <div @mouseenter="activeDropdown = 'profile'" @mouseleave="activeDropdown = null" class="relative h-full flex items-center">
                    <button class="{{ $btnClass }}" :class="activeDropdown === 'profile' ? '{{ $activeStyle }}' : '{{ $inactiveStyle }}'">
                        <span>Profile</span>
                        <svg class="w-3 h-3 transition-transform duration-300" :class="{'rotate-180': activeDropdown === 'profile'}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>

                    <div x-show="activeDropdown === 'profile'" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-3 scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         class="absolute top-full left-1/2 transform -translate-x-1/2 pt-6 w-[260px] z-50" 
                         style="display: none;">
                        
                        <div class="relative bg-white rounded-2xl shadow-[0_20px_60px_-15px_rgba(0,0,0,0.1)] border border-slate-100 p-2 overflow-hidden ring-1 ring-black/5">
                            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-blue-600"></div>

                            <div class="space-y-1 mt-2">
                                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 group transition-all duration-200">
                                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    </div>
                                    <span class="text-[13.5px] font-semibold text-slate-700 group-hover:text-blue-700">Tentang Kami</span>
                                </a>
                                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 group transition-all duration-200">
                                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                    </div>
                                    <span class="text-[13.5px] font-semibold text-slate-700 group-hover:text-blue-700">Visi Misi</span>
                                </a>
                                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-slate-50 group transition-all duration-200">
                                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    </div>
                                    <span class="text-[13.5px] font-semibold text-slate-700 group-hover:text-blue-700">Struktur Organisasi</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="#" class="{{ $linkClass }}">Produk</a>
                <a href="#" class="{{ $linkClass }}">Partnerships</a>
                <a href="#" class="{{ $linkClass }}">Area Jangkauan</a>
                <a href="#" class="{{ $linkClass }}">Lokasi</a>
                <a href="#" class="{{ $linkClass }}">Kontak</a>

            </div>
            
            <div class="hidden lg:flex items-center h-full space-x-2 lg:ml-4">
                <button class="w-9 h-9 rounded-full flex items-center justify-center text-slate-500 hover:bg-slate-100 hover:text-blue-600 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
                
                <div class="h-5 w-px bg-slate-200 mx-2"></div>

                <div @mouseenter="activeDropdown = 'bahasa'" @mouseleave="activeDropdown = null" class="relative h-full flex items-center">
                    <button class="flex items-center gap-1.5 px-3 py-2 rounded-full text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">
                        <span>ID</span>
                        <svg class="w-3 h-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    
                    <div x-show="activeDropdown === 'bahasa'" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         class="absolute right-0 top-full pt-4 w-[140px] z-50" 
                         style="display: none;">
                         
                        <div class="bg-white rounded-xl shadow-[0_10px_40px_-10px_rgba(0,0,0,0.1)] border border-slate-100 p-1.5 ring-1 ring-black/5">
                            <a href="#" class="flex items-center justify-between px-3 py-2 text-[13px] font-bold text-blue-600 bg-blue-50/50 rounded-lg">
                                <span>Indonesia</span>
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                            </a>
                            <a href="#" class="block px-3 py-2 text-[13px] font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-lg transition-colors">
                                English
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:hidden flex items-center ml-4">
                 <button class="text-slate-600 p-2 hover:bg-slate-100 rounded-lg transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>
    </nav>
</div>