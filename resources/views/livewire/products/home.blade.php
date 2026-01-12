<div>
    <div class="relative bg-white dark:bg-gray-900 pt-32 pb-16 lg:pt-40 lg:pb-20 overflow-hidden transition-colors duration-300">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[600px] h-[600px] bg-blue-50 dark:bg-blue-900/20 rounded-full blur-3xl opacity-50 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[400px] h-[400px] bg-cyan-50 dark:bg-cyan-900/20 rounded-full blur-3xl opacity-50 pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <span class="inline-block py-1 px-3 rounded-full bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-xs font-bold tracking-wider uppercase mb-4">
                Residential Services
            </span>
            <h1 class="text-4xl lg:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-6 transition-colors">
                Internet Stabil untuk <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500 dark:from-blue-400 dark:to-cyan-300">Keluarga</span>
            </h1>
            <p class="text-lg text-slate-600 dark:text-slate-300 max-w-2xl mx-auto leading-relaxed transition-colors">
                Nikmati pengalaman streaming, gaming, dan browsing tanpa batas dengan koneksi fiber optic super cepat di rumah Anda.
            </p>
        </div>
    </div>

    <div class="py-16 bg-slate-50 dark:bg-gray-900 border-t border-slate-200 dark:border-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($packages as $package)
                    <div class="bg-white dark:bg-gray-800 border border-slate-200 dark:border-gray-700 rounded-2xl p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden group">
                        
                        @if($package->is_popular)
                            <div class="absolute top-0 right-0">
                                <div class="bg-blue-600 text-white text-xs font-bold px-4 py-1.5 rounded-bl-xl shadow-md uppercase tracking-wide">
                                    Populer
                                </div>
                            </div>
                        @endif

                        <div class="relative z-10">
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 transition-colors">{{ $package->name }}</h3>
                            
                            <div class="my-5 pb-5 border-b border-slate-100 dark:border-gray-700 transition-colors">
                                <div class="flex items-baseline">
                                    <span class="text-sm font-medium text-slate-500 dark:text-slate-400 mr-1">Rp</span>
                                    <span class="text-3xl font-extrabold text-blue-600 dark:text-blue-400">{{ number_format($package->price, 0, ',', '.') }}</span>
                                </div>
                                <span class="text-slate-500 dark:text-slate-400 text-sm">/bulan</span>
                            </div>
                            
                            <div class="bg-slate-50 dark:bg-gray-700/50 rounded-lg p-3 mb-6 flex items-center justify-center gap-2 border border-slate-100 dark:border-gray-700 transition-colors">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                <span class="font-bold text-slate-700 dark:text-slate-200 text-sm">Speed up to {{ $package->speed }}</span>
                            </div>

                            <ul class="space-y-3 mb-8 min-h-[120px]">
                                @foreach($package->features as $feature)
                                    <li class="flex items-start text-slate-600 dark:text-slate-300 text-sm transition-colors">
                                        <svg class="w-5 h-5 text-green-500 dark:text-green-400 mr-2.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <span class="leading-tight">{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>

                            <a href="https://wa.me/6285880964340?text=Halo%20Admin,%20saya%20tertarik%20berlangganan%20paket%20{{ urlencode($package->name) }}" 
                            target="_blank" 
                            class="block w-full py-3.5 px-4 bg-slate-900 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-500 text-white text-center font-bold rounded-xl transition-all duration-300 shadow-lg hover:shadow-blue-500/30">
                                Pilih Paket
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 dark:bg-gray-800 mb-4">
                            <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </div>
                        <h3 class="text-lg font-medium text-slate-900 dark:text-white">Belum Ada Paket</h3>
                        <p class="mt-1 text-slate-500 dark:text-slate-400">Paket internet rumahan sedang diperbarui.</p>
                        <a href="{{ route('contact') }}" class="inline-block mt-4 text-blue-600 dark:text-blue-400 font-medium hover:underline">Hubungi Kami &rarr;</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>