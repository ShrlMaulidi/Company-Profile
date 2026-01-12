<section class="py-10 lg:py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-300" id="produk">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-6 lg:mb-12">
            <div class="text-center max-w-2xl mx-auto mb-6 lg:mb-8">
                <h2 class="text-blue-600 dark:text-blue-400 font-semibold tracking-wide uppercase text-[10px] lg:text-sm transition-colors">
                    Penawaran Terbaik
                </h2>
                <p class="mt-1 lg:mt-2 text-2xl font-extrabold text-slate-900 dark:text-white lg:text-4xl transition-colors">
                    Pilihan <span class="text-blue-600 dark:text-blue-400">Paket</span>
                </p>
                <p class="mt-2 lg:mt-4 text-sm lg:text-lg text-slate-600 dark:text-gray-300 transition-colors">
                    Pilih paket internet terbaik yang sesuai dengan kebutuhan aktivitas digital Anda.
                </p>
            </div>

            <div x-data="{ current: @entangle('activeType') }" 
                 class="relative inline-flex items-center justify-center p-1 bg-gray-200 dark:bg-gray-700 rounded-full w-full max-w-[200px] lg:max-w-[280px] shadow-inner select-none overflow-hidden h-8 lg:h-11 transition-all duration-300">
                <div class="absolute left-1 top-1 bottom-1 w-[calc(50%-4px)] rounded-full shadow-sm transition-all duration-500 ease-[cubic-bezier(0.34,1.56,0.64,1)] z-0"
                     :class="current === 'business' ? 'translate-x-[100%] bg-blue-700 dark:bg-blue-600' : 'translate-x-0 bg-white dark:bg-gray-600'">
                </div>

                <button type="button" @click="current = 'residential'" wire:click="$set('activeType', 'residential')" 
                    class="relative z-10 w-1/2 h-full flex items-center justify-center text-[10px] lg:text-sm font-bold tracking-wide transition-colors duration-300 rounded-full focus:outline-none"
                    :class="current === 'residential' ? 'text-blue-700 dark:text-blue-300' : 'text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white'">
                    Rumahan
                </button>

                <button type="button" @click="current = 'business'" wire:click="$set('activeType', 'business')"
                    class="relative z-10 w-1/2 h-full flex items-center justify-center text-[10px] lg:text-sm font-bold tracking-wide transition-colors duration-300 rounded-full focus:outline-none"
                    :class="current === 'business' ? 'text-white' : 'text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white'">
                    Bisnis
                </button>
            </div>
            
            <div class="h-4 lg:h-5 mt-1">
                <span wire:loading class="text-[9px] lg:text-xs font-medium text-blue-600 dark:text-blue-400 animate-pulse flex items-center justify-center gap-1">
                    <svg class="w-3 h-3 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                    Memperbarui harga...
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-6 items-start relative perspective-1000">
            <div wire:loading.flex class="absolute inset-0 z-20 bg-gray-50/50 dark:bg-gray-900/50 backdrop-blur-[1px] rounded-3xl items-start justify-center pt-20 transition-all duration-300"></div>

            @forelse($packages as $package)
                @php
                    $isPopular = $package->is_popular;
                    
                    // Logika nomor WhatsApp berdasarkan activeType
                    $waNumber = ($activeType === 'business') ? '6285600299019' : '6285880964340';
                    $tipeTeks = ($activeType === 'business') ? 'Bisnis' : 'Rumahan';
                    
                    $baseClasses = "transition-all duration-300 ease-in-out transform lg:hover:-translate-y-2 lg:hover:scale-[1.01] w-full max-w-[320px] lg:max-w-sm mx-auto";
                    
                    $cardClasses = $isPopular 
                        ? "relative bg-white dark:bg-gray-800 rounded-2xl p-4 lg:p-6 shadow-lg lg:shadow-[0_10px_30px_rgba(59,130,246,0.15)] ring-2 ring-blue-600 dark:ring-blue-500 lg:-translate-y-3 z-10 {$baseClasses}" 
                        : "bg-white dark:bg-gray-800 rounded-2xl p-4 lg:p-6 shadow-md border border-gray-100 dark:border-gray-700 {$baseClasses}";
                    
                    $btnClasses = $isPopular
                        ? 'bg-blue-600 text-white hover:bg-blue-700 shadow-md lg:shadow-lg lg:shadow-blue-600/30'
                        : 'bg-slate-900 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-500 text-white';
                @endphp

                <div class="{{ $cardClasses }}">
                    @if($isPopular)
                        <div class="absolute -top-3 left-1/2 transform -translate-x-1/2 w-max">
                            <span class="bg-gradient-to-r from-blue-600 to-blue-500 text-white px-2.5 py-0.5 lg:px-3 lg:py-1 rounded-full text-[9px] lg:text-xs font-bold uppercase tracking-wider shadow-md">
                                Paling Populer
                            </span>
                        </div>
                    @endif

                    <div class="text-center lg:text-left">
                        <h3 class="text-base lg:text-xl font-bold text-gray-900 dark:text-white transition-colors">{{ $package->name }}</h3>
                        
                        <div class="my-3 lg:my-5 pb-3 lg:pb-5 border-b border-gray-100 dark:border-gray-700 transition-colors">
                            <div class="flex items-baseline justify-center lg:justify-start">
                                <span class="text-xs lg:text-sm font-medium text-slate-500 dark:text-slate-400 mr-1">Rp</span>
                                <span class="text-2xl lg:text-4xl font-extrabold text-blue-600 dark:text-blue-400 tracking-tight transition-colors">
                                    {{ number_format($package->price, 0, ',', '.') }}
                                </span>
                            </div>
                            <span class="text-slate-500 dark:text-slate-400 text-[10px] lg:text-sm">/bulan</span>
                        </div>
                    </div>

                    <div class="bg-slate-50 dark:bg-gray-700/50 rounded-lg p-1.5 lg:p-2 mt-2 lg:mt-3 mb-3 lg:mb-4 flex items-center justify-center lg:justify-start gap-2 border border-slate-100 dark:border-gray-700 transition-colors">
                        <svg class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        <span class="font-bold text-slate-700 dark:text-slate-200 text-[11px] lg:text-sm transition-colors">Speed up to <b>{{ $package->speed }} </b> </span>
                    </div>

                    <ul class="space-y-2 lg:space-y-3 mb-5 lg:mb-8 min-h-0 lg:min-h-[120px] text-left">
                        @foreach($package->features as $feature)
                            <li class="flex items-start text-slate-600 dark:text-slate-300 text-[11px] lg:text-sm transition-colors">
                                <svg class="w-4 h-4 lg:w-5 lg:h-5 text-green-500 dark:text-green-400 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="leading-tight">{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <a href="https://wa.me/{{ $waNumber }}?text=Halo%20MSS,%20saya%20tertarik%20berlangganan%20paket%20{{ $tipeTeks }}%20{{ urlencode($package->name) }}" 
                       target="_blank" 
                       class="block w-full py-2.5 lg:py-3 px-4 text-xs lg:text-sm font-bold rounded-xl text-center transition-all duration-300 transform active:scale-95 shadow-md {{ $btnClasses }}">
                        Pilih Paket
                    </a>
                </div>
            @empty
                <div class="col-span-full py-16 text-center">
                    <p class="text-gray-500 dark:text-gray-400">Belum ada paket tersedia.</p>
                </div>
            @endforelse
        </div>
        
        <div class="mt-8 lg:mt-10 text-center px-4">
            <p class="text-gray-400 dark:text-gray-500 text-[9px] lg:text-xs uppercase tracking-widest font-semibold leading-relaxed transition-colors">
                *Harga belum termasuk PPN 11% &bull; Syarat & Ketentuan Berlaku
            </p>
        </div>
    </div>
</section>