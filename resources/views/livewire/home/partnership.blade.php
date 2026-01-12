<section class="py-20 bg-gray-50 dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ activeTab: 'all' }">
        
        <div class="text-center mb-12">
            <h2 class="text-blue-600 dark:text-blue-400 font-semibold tracking-wide uppercase text-sm transition-colors">
                KOLABORASI
            </h2>
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-4 transition-colors">
                Mitra <span class="text-blue-600 dark:text-blue-400">Strategis</span>
            </h2>
            <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto text-sm lg:text-base transition-colors">
                Berkolaborasi dengan berbagai sektor untuk membangun ekosistem digital yang handal dan terpercaya.
            </p>
            <div class="flex flex-wrap justify-center gap-2 mt-8">
                @php
                    $tabs = [
                        'all' => 'Semua',
                        'corporate' => 'Corporate',
                        'government' => 'Government',
                        'metro' => 'Metro E'
                    ];
                @endphp

                @foreach($tabs as $key => $label)
                    <button @click="activeTab = '{{ $key }}'" 
                            class="px-5 py-2 rounded-full text-xs lg:text-sm font-bold transition-all duration-300 border"
                            :class="activeTab === '{{ $key }}' 
                                ? 'bg-slate-800 dark:bg-blue-600 text-white border-slate-800 dark:border-blue-600 shadow-lg transform scale-105' 
                                : 'bg-white dark:bg-gray-800 text-slate-500 dark:text-gray-400 border-slate-200 dark:border-gray-700 hover:border-slate-400 dark:hover:border-gray-500 hover:text-slate-700 dark:hover:text-gray-200'">
                        {{ $label }}
                    </button>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6 lg:gap-8 items-center justify-items-center">
            
            @foreach($partners->take(20) as $partner)
                <div x-show="activeTab === 'all' || activeTab === '{{ $partner->category }}'"
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 scale-90"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="w-full h-24 lg:h-32 flex items-center justify-center p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 
                     hover:border-blue-100 dark:hover:border-blue-900 
                     hover:shadow-xl hover:shadow-blue-500/10 dark:hover:shadow-blue-900/10 
                     hover:-translate-y-1 
                     transition-all duration-300 group cursor-pointer">
                    
                     <img src="{{ Str::startsWith($partner->logo, 'http') ? $partner->logo : asset('storage/' . $partner->logo) }}" 
                          alt="{{ $partner->name }}" 
                          class="max-h-14 lg:max-h-16 w-auto object-contain 
                          transition-transform duration-300 
                          group-hover:scale-110">
                </div>
            @endforeach

        </div>
        
        @if($partners->isEmpty())
            <div class="text-center py-10 text-gray-400 dark:text-gray-500 text-sm">
                Belum ada mitra yang ditambahkan.
            </div>
        @endif

        @if($partners->count() > 20)
            <div class="mt-12 text-center">
                <a href="{{ route('partnership') }}" class="inline-flex items-center gap-2 px-8 py-3 rounded-full bg-slate-800 dark:bg-blue-600 text-white font-semibold text-sm hover:bg-slate-700 dark:hover:bg-blue-700 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    Lihat Lebih Banyak
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        @endif

        <div class="mt-8 text-center">
            <a href="{{ route('contact') }}" class="inline-flex items-center text-blue-600 dark:text-blue-400 font-semibold hover:text-blue-800 dark:hover:text-blue-300 transition-colors group text-sm">
                Ingin menjadi partner kami?
                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

    </div>
</section>