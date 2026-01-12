<div>
    <div class="pt-32 pb-20 px-6 lg:px-12 max-w-7xl mx-auto min-h-screen bg-white dark:bg-gray-900 transition-colors duration-300">
        <div class="text-center mb-10">
        <span class="inline-block py-1 px-3 rounded-full bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-xs font-bold tracking-wider uppercase mb-4">
                KOLABORASI
            </span>
            <h1 class="text-4xl font-bold text-slate-900 dark:text-white tracking-tight transition-colors">Mitra Kami</h1>
            <p class="mt-4 text-lg text-slate-600 dark:text-gray-400 max-w-2xl mx-auto transition-colors">
                Dipercaya oleh berbagai instansi pemerintah dan perusahaan swasta terkemuka.
            </p>
        </div>

        <div class="flex flex-wrap justify-center items-center gap-3 mb-8">
            @php
                $activeClass = 'bg-slate-800 dark:bg-blue-600 text-white shadow-md ring-2 ring-slate-800 dark:ring-blue-600 ring-offset-2 dark:ring-offset-gray-900';
                $inactiveClass = 'bg-white dark:bg-gray-800 text-slate-600 dark:text-gray-300 border border-slate-300 dark:border-gray-700 hover:bg-slate-50 dark:hover:bg-gray-700 hover:text-slate-900 dark:hover:text-white';
                $baseClass = 'px-6 py-2 rounded-full text-sm font-bold transition-all duration-200 transform active:scale-95';
            @endphp

            <button wire:click="setCategory('all')" class="{{ $baseClass }} {{ $category === 'all' ? $activeClass : $inactiveClass }}">
                Semua
            </button>

            <button wire:click="setCategory('corporate')" class="{{ $baseClass }} {{ $category === 'corporate' ? $activeClass : $inactiveClass }}">
                Corporate
            </button>

            <button wire:click="setCategory('government')" class="{{ $baseClass }} {{ $category === 'government' ? $activeClass : $inactiveClass }}">
                Government
            </button>

            <button wire:click="setCategory('metro')" class="{{ $baseClass }} {{ $category === 'metro' ? $activeClass : $inactiveClass }}">
                Metro E
            </button>
        </div>

        <div class="max-w-md mx-auto mb-16">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 dark:text-gray-500">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>

                <input
                    wire:model.live="search"
                    type="text"
                    placeholder="Cari nama mitra..."
                    class="w-full h-11 pl-11 pr-4 text-sm
                        border border-slate-300 dark:border-gray-700 rounded-xl
                        bg-white dark:bg-gray-800
                        text-slate-900 dark:text-white
                        placeholder-slate-400 dark:placeholder-gray-500
                        focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-blue-500 dark:focus:border-blue-400
                        transition-colors"
                >
                
                <div wire:loading wire:target="search" class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <svg class="animate-spin h-4 w-4 text-blue-500 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @forelse($partners as $partner)
                <div wire:key="partner-{{ $partner->id }}" class="group bg-white dark:bg-gray-800 border border-slate-100 dark:border-gray-700 rounded-xl p-4 hover:shadow-lg hover:border-blue-100 dark:hover:border-blue-900 transition-all duration-300 flex flex-col items-center justify-center cursor-default">
                    
                    <div class="h-20 w-full flex items-center justify-center mb-4">
                        @if($partner->logo)
                        <img src="{{ asset('storage/' . $partner->logo) }}" 
     alt="{{ $partner->name }}" 
     class="max-h-10 lg:max-h-12 w-auto object-contain transition-transform duration-300 group-hover:scale-110">
                        @else
                            <div class="w-12 h-12 bg-slate-50 dark:bg-gray-700 rounded-full flex items-center justify-center text-slate-300 dark:text-gray-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                    </div>
                    
                    <div class="text-center w-full">
                        <span class="text-sm font-semibold text-slate-600 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                            {{ $partner->name }}
                        </span>
                    </div>

                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-12 text-center">
                    <div class="bg-slate-50 dark:bg-gray-800 p-4 rounded-full mb-3 transition-colors">
                        <svg class="w-8 h-8 text-slate-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-medium text-slate-900 dark:text-white transition-colors">Tidak ditemukan</h3>
                    <p class="text-slate-500 dark:text-gray-400 mt-1 max-w-md mx-auto transition-colors">
                        Tidak ada mitra 
                        @if($category !== 'all') kategori <strong>{{ ucfirst($category) }}</strong> @endif
                        @if($search) dengan nama "<strong>{{ $search }}</strong>" @endif.
                    </p>
                    
                    <div class="mt-4 flex gap-2 justify-center">
                        @if($search || $category !== 'all')
                            <button wire:click="$set('search', ''); $set('category', 'all')" class="text-sm font-semibold text-blue-600 dark:text-blue-400 hover:underline transition-colors">
                                Reset Filter & Pencarian
                            </button>
                        @endif
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>