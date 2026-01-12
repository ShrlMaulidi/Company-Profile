<section class="py-20 bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 relative overflow-hidden text-white">
    
    <div class="absolute inset-0 opacity-10 pattern-grid-lg"></div>
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-72 h-72 rounded-full bg-blue-500 blur-3xl opacity-20 animate-pulse"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-72 h-72 rounded-full bg-cyan-500 blur-3xl opacity-20 animate-pulse animation-delay-2000"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        
        <div class="text-center mb-12">
            <h2 class="text-lg font-semibold text-cyan-400 tracking-wide uppercase">Pencapaian Kami</h2>
            <p class="mt-2 text-3xl font-extrabold sm:text-4xl">Tumbuh Bersama Pelanggan</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 max-w-4xl mx-auto">
            
            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-3xl p-8 lg:p-10 flex flex-col items-center text-center transform hover:scale-105 transition-all duration-300 group"
                 x-data="{ 
                    current: 0, 
                    target: 1000, 
                    duration: 2000,
                    animate() {
                        let start = null;
                        const step = (timestamp) => {
                            if (!start) start = timestamp;
                            const progress = timestamp - start;
                            const percentage = Math.min(progress / this.duration, 1);
                            
                            this.current = Math.floor(this.target * (1 - Math.pow(2, -10 * percentage)));
            
                            if (progress < this.duration) {
                                window.requestAnimationFrame(step);
                            } else {
                                this.current = this.target;
                            }
                        };
                        window.requestAnimationFrame(step);
                    }
                 }"
                 x-init="
                    $nextTick(() => {
                        const observer = new IntersectionObserver((entries) => {
                            if (entries[0].isIntersecting) {
                                animate();
                                observer.disconnect();
                            }
                        });
                        observer.observe($el);
                    })
                 ">
                 
                <div class="w-16 h-16 bg-blue-600/20 rounded-2xl flex items-center justify-center mb-6 text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                
                <h3 class="text-5xl lg:text-6xl font-black text-white mb-2 tabular-nums">
                    <span x-text="current.toLocaleString('id-ID')">0</span><span class="text-cyan-400 text-4xl">+</span>
                </h3>

                <p class="text-xl font-bold text-gray-200 mb-2">Pelanggan Home</p>
                <div class="h-1 w-12 bg-blue-500 rounded-full mb-4"></div>
                <p class="text-gray-400 text-sm lg:text-base">
                    Tersebar di seluruh wilayah <br><span class="text-white font-semibold">Karawang & Sekitarnya</span>
                </p>
            </div>

            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-3xl p-8 lg:p-10 flex flex-col items-center text-center transform hover:scale-105 transition-all duration-300 group"
                 x-data="{ 
                    current: 0, 
                    target: 100, 
                    duration: 2000,
                    animate() {
                        let start = null;
                        const step = (timestamp) => {
                            if (!start) start = timestamp;
                            const progress = timestamp - start;
                            const percentage = Math.min(progress / this.duration, 1);
                            
                            this.current = Math.floor(this.target * (1 - Math.pow(2, -10 * percentage)));
            
                            if (progress < this.duration) {
                                window.requestAnimationFrame(step);
                            } else {
                                this.current = this.target;
                            }
                        };
                        window.requestAnimationFrame(step);
                    }
                 }"
                 x-init="
                    $nextTick(() => {
                        const observer = new IntersectionObserver((entries) => {
                            if (entries[0].isIntersecting) {
                                animate();
                                observer.disconnect();
                            }
                        });
                        observer.observe($el);
                    })
                 ">
                 
                <div class="w-16 h-16 bg-cyan-600/20 rounded-2xl flex items-center justify-center mb-6 text-cyan-400 group-hover:bg-cyan-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                    </svg>
                </div>
                
                <h3 class="text-5xl lg:text-6xl font-black text-white mb-2 tabular-nums">
                    <span x-text="current.toLocaleString('id-ID')">0</span><span class="text-cyan-400 text-4xl">+</span>
                </h3>

                <p class="text-xl font-bold text-gray-200 mb-2">Mitra & Corporate</p>
                <div class="h-1 w-12 bg-cyan-500 rounded-full mb-4"></div>
                <p class="text-gray-400 text-sm lg:text-base">
                    Dipercaya oleh perusahaan di <br><span class="text-white font-semibold">Seluruh Indonesia</span>
                </p>
            </div>

        </div>
    </div>
</section>