<div>
    <div class="relative bg-white dark:bg-gray-900 pt-32 pb-16 lg:pt-40 lg:pb-20 overflow-hidden transition-colors duration-300">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[600px] h-[600px] bg-blue-50 dark:bg-blue-900/20 rounded-full blur-3xl opacity-50 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[400px] h-[400px] bg-cyan-50 dark:bg-cyan-900/20 rounded-full blur-3xl opacity-50 pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <span class="inline-block py-1 px-3 rounded-full bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-xs font-bold tracking-wider uppercase mb-4">
                Corporate Services
            </span>
            <h1 class="text-4xl lg:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-6 transition-colors">
                Solusi Bisnis & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500 dark:from-blue-400 dark:to-cyan-300">Korporasi</span>
            </h1>
            <p class="text-lg text-slate-600 dark:text-slate-300 max-w-2xl mx-auto leading-relaxed transition-colors">
                Infrastruktur jaringan handal, Dedicated Internet, dan Managed Service untuk menunjang produktivitas dan pertumbuhan perusahaan Anda.
            </p>
        </div>
    </div>

    <div class="py-16 bg-slate-50 dark:bg-gray-900 border-t border-slate-200 dark:border-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($packages as $package)
                    <div class="bg-white dark:bg-gray-800 border border-blue-100 dark:border-gray-700 rounded-2xl p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden ring-1 ring-blue-50 dark:ring-gray-700 group">
                        
                        <div class="absolute top-0 right-0 w-24 h-24 bg-blue-50 dark:bg-blue-900/20 rounded-bl-full -mr-4 -mt-4 transition-colors"></div>

                        <div class="relative z-10">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">{{ $package->name }}</h3>
                                <span class="bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 text-xs font-bold px-2.5 py-1 rounded-lg uppercase tracking-wide">Biz</span>
                            </div>
                            
                            <div class="my-5 pb-5 border-b border-slate-100 dark:border-gray-700 transition-colors">
                                <div class="flex items-baseline">
                                    <span class="text-sm font-medium text-slate-500 dark:text-slate-400 mr-1">Rp</span>
                                    <span class="text-3xl font-extrabold text-slate-900 dark:text-white">{{ number_format($package->price, 0, ',', '.') }}</span>
                                </div>
                                <span class="text-slate-500 dark:text-slate-400 text-sm">/bulan (belum PPN)</span>
                            </div>
                            
                            <div class="font-bold text-blue-700 dark:text-blue-400 mb-6 flex items-center gap-2 transition-colors">
                                <div class="p-1.5 bg-blue-50 dark:bg-blue-900/30 rounded-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </div>
                                <span>Speed up to {{ $package->speed }}</span>
                            </div>

                            <ul class="space-y-3 mb-8 min-h-[120px]">
                                @foreach($package->features as $feature)
                                    <li class="flex items-start text-slate-600 dark:text-slate-300 text-sm transition-colors">
                                        <svg class="w-5 h-5 text-green-500 dark:text-green-400 mr-2.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <span class="leading-tight">{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>

                            <a href="https://wa.me/6285600299019?text=Halo%20Admin,%20saya%20tertarik%20berlangganan%20paket%20{{ urlencode($package->name) }}" 
                            target="_blank" 
                            class="block w-full py-3.5 px-4 bg-slate-900 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-500 text-white text-center font-bold rounded-xl transition-all duration-300 shadow-lg hover:shadow-blue-500/30">
                                Pilih Paket
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 dark:bg-gray-800 mb-4">
                            <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                        </div>
                        <h3 class="text-lg font-medium text-slate-900 dark:text-white">Belum Ada Paket</h3>
                        <p class="mt-1 text-slate-500 dark:text-slate-400">Paket bisnis sedang diperbarui. Silakan hubungi kami secara langsung.</p>
                        <a href="{{ route('contact') }}" class="inline-block mt-4 text-blue-600 dark:text-blue-400 font-medium hover:underline">Hubungi Kami &rarr;</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>