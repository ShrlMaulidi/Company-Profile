<div>
<footer class="relative bg-slate-900 pt-10 pb-8 mt-8 rounded-t-3xl lg:rounded-t-[4rem] overflow-hidden">
    
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full max-w-7xl overflow-hidden pointer-events-none">
        <div class="absolute top-[10%] left-[5%] w-64 h-64 lg:w-96 lg:h-96 bg-blue-600/10 rounded-full blur-3xl mix-blend-screen"></div>
        <div class="absolute bottom-[20%] right-[5%] w-64 h-64 lg:w-80 lg:h-80 bg-cyan-500/10 rounded-full blur-3xl mix-blend-screen"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-y-10 gap-x-8 lg:gap-12 mb-10">
            
            <div class="lg:col-span-4 space-y-5">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="bg-white p-1.5 rounded-lg h-10 w-10 flex items-center justify-center shadow-lg shadow-blue-500/20 group-hover:scale-105 transition-transform duration-300">
                        <img src="/mss.png" alt="MSS Logo" class="h-full w-auto object-contain">
                    </div>
                    <span class="text-lg lg:text-xl font-bold text-white tracking-tight leading-tight">
                        PT Media<br>Solusi Sukses
                    </span>
                </a>
                <p class="text-slate-400 leading-relaxed text-sm pr-0 lg:pr-4 max-w-md">
                    Mitra teknologi terpercaya yang menghadirkan solusi internet cepat, stabil, dan andal untuk Indonesia.
                </p>

                <div class="flex gap-3 pt-1">
                    <a href="https://www.instagram.com/mediasolusisukses.pt/" target="_blank" class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-400 hover:bg-pink-600 hover:border-pink-500 hover:text-white transition-all duration-300 group shadow-md hover:shadow-pink-500/30">
                        <span class="sr-only">Instagram</span>
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </a>

                    <a href="https://facebook.com" target="_blank" class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:border-blue-500 hover:text-white transition-all duration-300 group shadow-md hover:shadow-blue-500/30">
                        <span class="sr-only">Facebook</span>
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </a>

                    <a href="https://tiktok.com" target="_blank" class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-400 hover:bg-black hover:border-slate-500 hover:text-white transition-all duration-300 group shadow-md hover:shadow-slate-500/30">
                        <span class="sr-only">TikTok</span>
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-2 lg:col-start-6">
                <h3 class="text-white font-bold text-lg lg:text-base mb-5 lg:mb-4 border-l-4 border-blue-600 pl-3">Perusahaan</h3>
                <ul class="space-y-3 lg:space-y-2">
                    <li><a href="{{ route('profile.about') }}" class="text-slate-400 hover:text-blue-400 transition-colors text-sm flex items-center gap-2 group w-fit"><span class="w-1.5 h-1.5 lg:w-1 lg:h-1 rounded-full bg-slate-600 group-hover:bg-blue-400 transition-colors"></span> Tentang Kami</a></li>
                    <li><a href="{{ route('profile.structure') }}" class="text-slate-400 hover:text-blue-400 transition-colors text-sm flex items-center gap-2 group w-fit"><span class="w-1.5 h-1.5 lg:w-1 lg:h-1 rounded-full bg-slate-600 group-hover:bg-blue-400 transition-colors"></span> Manajemen</a></li>
                </ul>
            </div>

            <div class="lg:col-span-2">
                <h3 class="text-white font-bold text-lg lg:text-base mb-5 lg:mb-4 border-l-4 border-blue-600 pl-3">Layanan</h3>
                <ul class="space-y-3 lg:space-y-2">
                    <li><a href="{{ route('products.home') }}" class="text-slate-400 hover:text-blue-400 transition-colors text-sm flex items-center gap-2 group w-fit"><span class="w-1.5 h-1.5 lg:w-1 lg:h-1 rounded-full bg-slate-600 group-hover:bg-blue-400 transition-colors"></span> Internet Rumah</a></li>
                    <li><a href="{{ route('products.business') }}" class="text-slate-400 hover:text-blue-400 transition-colors text-sm flex items-center gap-2 group w-fit"><span class="w-1.5 h-1.5 lg:w-1 lg:h-1 rounded-full bg-slate-600 group-hover:bg-blue-400 transition-colors"></span> Internet Bisnis</a></li>
                </ul>
            </div>

            <div class="lg:col-span-3">
                <h3 class="text-white font-bold text-lg lg:text-base mb-5 lg:mb-4 border-l-4 border-blue-600 pl-3">Hubungi Kami</h3>
                <ul class="space-y-4 lg:space-y-3">
                    <li class="flex items-start gap-3 text-slate-400 text-sm group hover:text-slate-300 transition-colors">
                        <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span class="leading-relaxed">
                            Perum. Bumi Karawang Residence, Blok G12 No. 7, Desa Cengkong,<br class="hidden lg:block">
                            Kecamatan Purwasari, Kabupaten Karawang, 41373
                        </span>
                    </li>
                    <li class="flex items-center gap-3 text-slate-400 text-sm group hover:text-slate-300 transition-colors">
                        <svg class="w-5 h-5 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        (021) 3970 0444
                    </li>
                    <li class="flex items-center gap-3 text-slate-400 text-sm group hover:text-slate-300 transition-colors">
                        <svg class="w-5 h-5 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        admin.office@mediasolusisukses.co.id
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-slate-800 pt-6 flex flex-col-reverse md:flex-row justify-between items-center gap-4 text-center md:text-left">
            <p class="text-slate-500 text-xs font-medium leading-relaxed">
                &copy; {{ date('Y') }} PT Media Solusi Sukses. All rights reserved.
            </p>
            <div class="flex gap-6 text-xs font-medium">
                <a href="#" class="text-slate-500 hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="text-slate-500 hover:text-white transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
</div>