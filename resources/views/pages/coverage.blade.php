<x-layouts.app title="Area Jangkauan | PT Media Solusi Sukses">
    <div x-data="{ search: '' }" class="pt-24 lg:pt-32 pb-20 px-4 sm:px-6 lg:px-12 max-w-7xl mx-auto min-h-screen">
        <div class="text-center mb-12 max-w-3xl mx-auto">
        <span class="inline-block py-1 px-3 rounded-full bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-xs font-bold tracking-wider uppercase mb-4">
                CAKUPAN WILAYAH
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-4">
                Jangkauan Layanan Kami</span>
            </h1>
            <p class="text-slate-600 dark:text-slate-400 text-lg leading-relaxed">
                Kami terus memperluas jaringan Fiber Optic untuk menghadirkan internet cepat di wilayah Karawang Timur, khususnya Klari dan Purwasari.
            </p>

            <div class="mt-8 relative max-w-xl mx-auto group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input 
                    x-model="search" 
                    type="text" 
                    placeholder="Cari nama desa atau perumahan..." 
                    class="block w-full pl-11 pr-4 py-4 bg-white dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all shadow-lg shadow-blue-900/5"
                >
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-10">
            <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 lg:p-8 shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-800 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/5 rounded-bl-full -mr-8 -mt-8 pointer-events-none"></div>
                <div class="flex items-center gap-4 mb-6 border-b border-slate-100 dark:border-slate-800 pb-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-blue-600 dark:text-blue-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white">Kecamatan Klari</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Karawang Timur</p>
                    </div>
                </div>
                <div class="space-y-6">
                    <div>
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Desa / Kelurahan</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach(['Anggadita', 'Belendung', 'Cibalongsari', 'Cimahi', 'Curug', 'Duren', 'Gintungkerta', 'Karanganyar', 'Kiarapayung', 'Klari', 'Pancawati', 'Sumurkondang', 'Walahar'] as $desa)
                                <span x-show="'{{ strtolower($desa) }}'.includes(search.toLowerCase())" 
                                      class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-700 transition-all hover:border-blue-300 dark:hover:border-blue-700 hover:text-blue-600 dark:hover:text-blue-400 cursor-default">
                                    <svg class="w-3.5 h-3.5 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-8a2 2 0 012-2h14a2 2 0 012 2v8M9 10a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                    {{ $desa }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Perumahan / Residensial</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach(['Citra Kebun Mas (CKM)', 'Kartika Residence', 'Perumahan De Keraton', 'Griya Pesona Asri', 'Mustika Prakarsa', 'Teragsari', 'Puri Kosambi', 'Klari Regency'] as $perum)
                                <div x-show="'{{ strtolower($perum) }}'.includes(search.toLowerCase())" 
                                     class="flex items-center p-3 rounded-xl bg-blue-50/50 dark:bg-blue-900/10 border border-blue-100 dark:border-blue-900/50">
                                    <div class="w-2 h-2 rounded-full bg-green-500 mr-3 animate-pulse"></div>
                                    <span class="text-sm font-semibold text-slate-700 dark:text-slate-200">{{ $perum }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 lg:p-8 shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-800 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-cyan-500/5 rounded-bl-full -mr-8 -mt-8 pointer-events-none"></div>

                <div class="flex items-center gap-4 mb-6 border-b border-slate-100 dark:border-slate-800 pb-4">
                    <div class="w-12 h-12 rounded-xl bg-cyan-100 dark:bg-cyan-900/30 flex items-center justify-center text-cyan-600 dark:text-cyan-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white">Kecamatan Purwasari</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Karawang Timur</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Desa / Kelurahan</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach(['Cengkong', 'Darawolong', 'Karangsari', 'Mekarjaya', 'Purwasari', 'Sukasari', 'Tamelang', 'Tegalwaru'] as $desa)
                                <span x-show="'{{ strtolower($desa) }}'.includes(search.toLowerCase())" 
                                      class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-700 transition-all hover:border-cyan-300 dark:hover:border-cyan-700 hover:text-cyan-600 dark:hover:text-cyan-400 cursor-default">
                                    <svg class="w-3.5 h-3.5 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-8a2 2 0 012-2h14a2 2 0 012 2v8M9 10a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                    {{ $desa }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Perumahan / Residensial</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach(['Purwasari Regency', 'Cengkong Persada', 'Pagadungan', 'Perumahan Vidya', 'Griya Persada', 'Bumi Purwasari Residence'] as $perum)
                                <div x-show="'{{ strtolower($perum) }}'.includes(search.toLowerCase())" 
                                     class="flex items-center p-3 rounded-xl bg-cyan-50/50 dark:bg-cyan-900/10 border border-cyan-100 dark:border-cyan-900/50">
                                    <div class="w-2 h-2 rounded-full bg-green-500 mr-3 animate-pulse"></div>
                                    <span class="text-sm font-semibold text-slate-700 dark:text-slate-200">{{ $perum }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-16 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-yellow-50 dark:bg-yellow-900/20 text-yellow-700 dark:text-yellow-400 text-sm font-medium mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Lokasi Anda belum terdaftar?
            </div>
            <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">Ajukan Perluasan Jaringan</h3>
            <p class="text-slate-600 dark:text-slate-400 mb-6 max-w-lg mx-auto">
                Kami terus berekspansi. Jika wilayah Anda belum ada di daftar, beri tahu kami agar kami bisa memprioritaskan area Anda.
            </p>
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-600/30 transition-all duration-300 transform hover:-translate-y-1">
                Hubungi Tim Survey
            </a>
        </div>

    </div>
</x-layouts.app>