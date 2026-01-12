<section class="relative py-12 lg:py-32 bg-white dark:bg-gray-900 overflow-hidden transition-colors duration-300" id="contact">

    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-[-5%] left-[-10%] w-64 h-64 lg:w-[500px] lg:h-[500px] bg-blue-100/50 dark:bg-blue-900/20 rounded-full blur-3xl mix-blend-multiply dark:mix-blend-normal opacity-70"></div>
        <div class="absolute bottom-[-5%] right-[-10%] w-64 h-64 lg:w-[500px] lg:h-[500px] bg-cyan-100/50 dark:bg-cyan-900/20 rounded-full blur-3xl mix-blend-multiply dark:mix-blend-normal opacity-70"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="text-center max-w-2xl mx-auto mb-10 lg:mb-16">
            <h2 class="text-blue-600 dark:text-blue-400 font-semibold tracking-wide uppercase text-xs lg:text-sm mb-2 lg:mb-3 transition-colors">Hubungi Kami</h2>
            <h3 class="text-2xl md:text-3xl lg:text-5xl font-bold text-slate-900 dark:text-white mb-4 lg:mb-6 tracking-tight transition-colors">Siap Memulai Proyek Anda?</h3>
            <p class="text-slate-500 dark:text-gray-400 text-base lg:text-lg leading-relaxed transition-colors px-2">
                Kunjungi kantor kami atau kirimkan pesan untuk mendiskusikan kebutuhan digital bisnis Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-16 items-start">
            
            <div class="bg-white dark:bg-gray-800 rounded-3xl lg:rounded-[2.5rem] p-6 lg:p-12 shadow-[0_10px_30px_rgba(8,_112,_184,_0.07)] dark:shadow-[0_20px_50px_rgba(0,0,0,0.3)] border border-slate-100 dark:border-gray-700 relative overflow-hidden group transition-colors duration-300">
                
                <div class="absolute top-0 left-0 w-full h-1 lg:h-1.5 bg-gradient-to-r from-blue-500 to-cyan-400"></div>

                <form wire:submit="save" class="space-y-4 lg:space-y-6">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6">
                        <div class="space-y-1.5 lg:space-y-2">
                            <label for="name" class="text-sm font-semibold text-slate-700 dark:text-gray-300 ml-1 transition-colors">Nama Lengkap</label>
                            <input type="text" id="name" wire:model="name" placeholder="Nama Anda" 
                                class="w-full px-4 py-3 lg:px-5 lg:py-4 rounded-xl lg:rounded-2xl bg-slate-50 dark:bg-gray-700 border-transparent focus:bg-white dark:focus:bg-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 outline-none text-sm lg:text-base text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-gray-500 @error('name') border-red-500 ring-4 ring-red-500/10 @enderror">
                            @error('name') <span class="text-red-500 text-xs ml-1 block mt-1">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="space-y-1.5 lg:space-y-2">
                            <label for="email" class="text-sm font-semibold text-slate-700 dark:text-gray-300 ml-1 transition-colors">Alamat Email</label>
                            <input type="email" id="email" wire:model="email" placeholder="email@contoh.com" 
                                class="w-full px-4 py-3 lg:px-5 lg:py-4 rounded-xl lg:rounded-2xl bg-slate-50 dark:bg-gray-700 border-transparent focus:bg-white dark:focus:bg-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 outline-none text-sm lg:text-base text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-gray-500 @error('email') border-red-500 ring-4 ring-red-500/10 @enderror">
                            @error('email') <span class="text-red-500 text-xs ml-1 block mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="space-y-1.5 lg:space-y-2">
                        <label for="subject" class="text-sm font-semibold text-slate-700 dark:text-gray-300 ml-1 transition-colors">Subjek</label>
                        <select id="subject" wire:model="subject"
                            class="w-full px-4 py-3 lg:px-5 lg:py-4 rounded-xl lg:rounded-2xl bg-slate-50 dark:bg-gray-700 border-transparent focus:bg-white dark:focus:bg-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 outline-none text-sm lg:text-base text-slate-900 dark:text-white cursor-pointer appearance-none @error('subject') border-red-500 ring-4 ring-red-500/10 @enderror">
                            <option value="" disabled selected>Pilih Kebutuhan Anda</option>
                            <option value="internet">Layanan Internet</option>
                            <option value="partnership">Kemitraan</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                        @error('subject') <span class="text-red-500 text-xs ml-1 block mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="space-y-1.5 lg:space-y-2">
                        <label for="message" class="text-sm font-semibold text-slate-700 dark:text-gray-300 ml-1 transition-colors">Pesan Anda</label>
                        <textarea id="message" wire:model="message" rows="4" placeholder="Tuliskan detail pesan Anda disini..." 
                            class="w-full px-4 py-3 lg:px-5 lg:py-4 rounded-xl lg:rounded-2xl bg-slate-50 dark:bg-gray-700 border-transparent focus:bg-white dark:focus:bg-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 outline-none text-sm lg:text-base text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-gray-500 resize-none @error('message') border-red-500 ring-4 ring-red-500/10 @enderror"></textarea>
                        @error('message') <span class="text-red-500 text-xs ml-1 block mt-1">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" 
                        wire:loading.attr="disabled"
                        class="w-full py-3 lg:py-4 px-6 lg:px-8 rounded-xl bg-blue-600 dark:bg-blue-500 hover:bg-blue-700 dark:hover:bg-blue-600 text-white font-bold text-base lg:text-lg shadow-lg shadow-blue-600/30 transition-all duration-300 transform hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed">
                        
                        <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>

                        <span wire:loading.remove wire:target="save">Kirim Pesan</span>
                        <span wire:loading wire:target="save">Mengirim...</span>
                    </button>
                </form>
            </div>

            <div class="relative w-full h-[450px] lg:h-full lg:min-h-[600px] rounded-3xl lg:rounded-[2.5rem] overflow-hidden shadow-[0_20px_50px_rgba(8,_112,_184,_0.2)] border-4 border-white dark:border-gray-700 group transform transition-all duration-500 hover:shadow-[0_30px_60px_rgba(8,_112,_184,_0.3)]">
                
                <iframe 
                    width="100%" 
                    height="100%" 
                    class="w-full h-full object-cover transition-all duration-700 ease-in-out filter grayscale hover:grayscale-0 contrast-125 opacity-90 hover:opacity-100"
                    style="border:0;" 
                    loading="lazy" 
                    allowfullscreen 
                    src="https://maps.google.com/maps?q=-6.3593578,107.3927258&hl=es;z=14&output=embed">
                </iframe>

                <div class="absolute inset-0 pointer-events-none bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-80"></div>

                <div class="absolute bottom-4 left-4 right-4 lg:bottom-8 lg:left-8 lg:right-8 bg-white/80 dark:bg-gray-900/80 backdrop-blur-xl p-4 lg:p-6 rounded-2xl lg:rounded-3xl shadow-2xl border border-white/50 dark:border-gray-600 transform transition-all duration-500 hover:-translate-y-1 lg:hover:-translate-y-2 hover:bg-white/95 dark:hover:bg-gray-900/95">
                    
                    <div class="flex items-start justify-between gap-3 lg:gap-4">
                        <div class="flex items-start gap-3 lg:gap-4">
                            <div class="relative shrink-0 mt-1">
                                <span class="absolute top-0 left-0 w-full h-full bg-blue-500 rounded-full animate-ping opacity-75"></span>
                                <div class="relative w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-gradient-to-br from-blue-600 to-blue-500 flex items-center justify-center text-white shadow-lg shadow-blue-500/30">
                                    <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                            </div>

                            <div class="min-w-0">
                                <h5 class="font-bold text-slate-900 dark:text-white text-base lg:text-lg tracking-tight transition-colors truncate">Kantor Operasional</h5>
                                <p class="text-xs lg:text-sm text-slate-600 dark:text-gray-300 mt-1 leading-relaxed font-medium transition-colors">
                                    Karawang, Jawa Barat<br>
                                    <span class="text-[10px] lg:text-xs text-slate-400 dark:text-gray-500 font-mono mt-1 block bg-slate-100 dark:bg-gray-800 w-fit px-2 py-0.5 rounded transition-colors">-6.3593, 107.3927</span>
                                </p>
                            </div>
                        </div>
                        
                        <a href="https://maps.google.com/maps?q=-6.3593578,107.3927258" target="_blank" class="hidden sm:flex w-10 h-10 rounded-full bg-slate-100 dark:bg-gray-700 hover:bg-blue-600 dark:hover:bg-blue-500 hover:text-white text-slate-400 dark:text-gray-400 items-center justify-center transition-all duration-300 group-hover:rotate-45 shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>

                    <div class="mt-4 lg:mt-5 grid grid-cols-2 gap-2 lg:gap-3">
                        <a href="https://maps.google.com/maps?q=-6.3593578,107.3927258" target="_blank" class="flex items-center justify-center gap-1.5 lg:gap-2 py-2 lg:py-2.5 px-3 lg:px-4 rounded-lg lg:rounded-xl bg-blue-600 text-white text-xs lg:text-sm font-semibold hover:bg-blue-700 transition-colors shadow-lg shadow-blue-600/20">
                            <svg class="w-3.5 h-3.5 lg:w-4 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0121 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                            Rute
                        </a>

                        <button onclick="copyToClipboard('-6.3593578, 107.3927258')" class="flex items-center justify-center gap-1.5 lg:gap-2 py-2 lg:py-2.5 px-3 lg:px-4 rounded-lg lg:rounded-xl bg-slate-100 dark:bg-gray-700 text-slate-600 dark:text-gray-300 text-xs lg:text-sm font-semibold hover:bg-slate-200 dark:hover:bg-gray-600 transition-colors active:bg-blue-100 dark:active:bg-blue-900 active:text-blue-700 dark:active:text-blue-300 group-copy">
                            <svg class="w-3.5 h-3.5 lg:w-4 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            <span id="copyText">Copy Lokasi</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('message-sent', (event) => {
                Swal.fire({
                    title: 'Pesan Terkirim!',
                    text: 'Terima kasih telah menghubungi kami. Tim kami akan segera menghubungi Anda.',
                    icon: 'success',
                    confirmButtonText: 'Oke',
                    confirmButtonColor: '#2563eb',
                    background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#ffffff',
                    color: document.documentElement.classList.contains('dark') ? '#ffffff' : '#1f2937',
                    customClass: {
                        popup: 'dark:border dark:border-gray-700'
                    }
                });
            });
        });

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                const copyTextSpan = document.getElementById('copyText');
                const originalText = copyTextSpan.innerText;
                
                copyTextSpan.innerText = "Tersalin!";
                
                setTimeout(() => {
                    copyTextSpan.innerText = originalText;
                }, 2000);

            }).catch(err => {
                console.error('Error copying text: ', err);
                Swal.fire({
                    title: 'Gagal',
                    text: 'Gagal menyalin lokasi ke clipboard.',
                    icon: 'error',
                    confirmButtonColor: '#ef4444'
                });
            });
        }
    </script>
</section>