<section class="py-10 lg:py-16 bg-white dark:bg-gray-900 border-t border-slate-100 dark:border-slate-800 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8 text-center">
        <span class="text-blue-600 dark:text-blue-400 font-bold tracking-wider uppercase text-xs">Jaringan Infrastruktur</span>
        <h3 class="mt-2 text-xl md:text-2xl font-bold text-slate-900 dark:text-white">
            Official Network Partners
        </h3>
    </div>

    @php
        $partners = [
            ['name' => 'Telkom Indonesia', 'logo' => 'Telkom.png', 'h' => 'h-20 lg:h-15'],
            ['name' => 'Indosat Ooredoo',  'logo' => 'Indosat.png', 'h' => 'h-8 lg:h-10'],
            ['name' => 'Lintasarta',      'logo' => 'Lintas.webp', 'h' => 'h-12 lg:h-15'],
            ['name' => 'iForte',          'logo' => 'Iforte.png', 'h' => 'h-6 lg:h-8'],
            ['name' => 'FiberStar',       'logo' => 'Fiber.png', 'h' => 'h-7 lg:h-9'],
            ['name' => 'MV.Net',       'logo' => 'mvnetlogo.png', 'h' => 'h-11 lg:h-12'],
            ['name' => 'CBN',       'logo' => 'cbn.png', 'h' => 'h-11 lg:h-12'],
            ['name' => 'Aprin',       'logo' => 'aprin.jpg', 'h' => 'h-11 lg:h-12'],
        ];
        
        $allPartners = array_merge($partners, $partners, $partners);
    @endphp

    <div class="relative w-full max-w-[100vw] overflow-hidden group">
        <div class="absolute left-0 top-0 bottom-0 w-24 lg:w-40 z-20 bg-gradient-to-r from-white via-white/95 to-transparent dark:from-gray-900 dark:via-gray-900/95 pointer-events-none"></div>
        <div class="absolute right-0 top-0 bottom-0 w-24 lg:w-40 z-20 bg-gradient-to-l from-white via-white/95 to-transparent dark:from-gray-900 dark:via-gray-900/95 pointer-events-none"></div>

        <div class="flex items-center gap-12 lg:gap-20 w-max animate-marquee hover:[animation-play-state:paused] py-4 pl-4">
            
        @foreach($allPartners as $partner)
                <div class="relative group/logo flex items-center justify-center px-2 py-2">
                    {{-- Glow Effect (Latar Belakang Cahaya saat Hover) --}}
                    <div class="absolute -inset-4 bg-blue-500/10 dark:bg-blue-400/20 rounded-full blur-xl opacity-0 group-hover/logo:opacity-100 transition-opacity duration-300"></div>
                    <img src="{{ asset('partners/' . $partner['logo']) }}" 
                         alt="{{ $partner['name'] }}" 
                         class="{{ $partner['h'] }} w-auto object-contain hover:scale-110 transition-transform duration-300 ease-out relative z-10 cursor-pointer transform will-change-transform drop-shadow-sm">
                </div>
            @endforeach

        </div>
    </div>
</section>

<style>
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-33.333%); }
    }
    .animate-marquee {
        /* Kecepatan lebih tinggi (20s) sesuai request sebelumnya */
        animation: marquee 20s linear infinite; 
        will-change: transform;
    }
</style>