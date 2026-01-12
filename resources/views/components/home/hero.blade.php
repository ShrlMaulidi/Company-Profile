<section id="tes" class="relative bg-gradient-to-r from-blue-900 via-blue-700 to-cyan-50 pt-16 lg:pt-0 transition-colors duration-500">
    <div class="max-w-screen-2xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 lg:gap-8 items-center min-h-[auto] lg:min-h-[700px]">
            <div class="px-6 py-12 lg:px-16 lg:py-24 relative z-10 order-2 lg:order-1">
                <p class="text-cyan-300 font-semibold text-sm lg:text-lg mb-3 lg:mb-4 tracking-wide">
                    #InnovatingYourFuture
                </p>
                <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black text-white mb-4 lg:mb-6 leading-tight">
                    Smart Solutions<br>For Your Business
                </h1>
                <p class="text-gray-100 dark:text-gray-300 text-sm lg:text-lg mb-6 lg:mb-8 max-w-lg leading-relaxed opacity-90 transition-colors">
                    Transformasi bisnis Anda melalui solusi teknologi terintegrasi dan infrastruktur jaringan handal dari PT Media Solusi Sukses.
                </p>
                <a href="#" class="inline-flex items-center bg-blue-600 dark:bg-blue-500 text-white px-6 py-3 lg:px-8 lg:py-4 rounded-lg font-semibold shadow-xl hover:bg-blue-700 dark:hover:bg-blue-600 transition duration-300 group text-sm lg:text-base">
                    Explore Services
                    <svg class="w-4 h-4 lg:w-5 lg:h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
            
            <div class="relative w-full h-[350px] sm:h-[450px] lg:h-full lg:min-h-[700px] order-1 lg:order-2 overflow-hidden rounded-bl-[50px] lg:rounded-bl-[100px] z-0"
                 style="transform: translateZ(0);" 
                 x-data="{
                    activeSlide: 1,
                    isAnimating: false,
                    duration: 'duration-500',
                    isMobile: window.innerWidth < 1024,
                    sources: [
                        '{{ asset('images/01.png') }}',
                        '{{ asset('images/02.jpeg') }}',
                        '{{ asset('dalam.jpeg') }}',
                        '{{ asset('images/03.jpeg') }}',
                        '{{ asset('images/04.png') }}',
                    ],
                    slides: [],
                    initSlider() {
                        this.slides = [
                            this.sources[this.sources.length - 1],
                            ...this.sources,
                            this.sources[0]
                        ];
                        window.addEventListener('resize', () => {
                            this.isMobile = window.innerWidth < 1024;
                        });
                    },
                    next() {
                        if (this.isAnimating) return;
                        this.isAnimating = true;
                        this.duration = 'duration-500';
                        this.activeSlide++;
                        if (this.activeSlide === this.slides.length - 1) {
                            setTimeout(() => {
                                this.duration = 'duration-0';
                                this.activeSlide = 1;
                                this.isAnimating = false;
                            }, 500);
                        } else {
                            setTimeout(() => this.isAnimating = false, 500);
                        }
                    },
                    prev() {
                        if (this.isAnimating) return;
                        this.isAnimating = true;
                        this.duration = 'duration-500';
                        this.activeSlide--;
                        if (this.activeSlide === 0) {
                            setTimeout(() => {
                                this.duration = 'duration-0';
                                this.activeSlide = this.slides.length - 2;
                                this.isAnimating = false;
                            }, 500);
                        } else {
                            setTimeout(() => this.isAnimating = false, 500);
                        }
                    }
                 }"
                 x-init="initSlider()">
                
                <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 to-transparent z-10 lg:hidden pointer-events-none"></div>
                
                <div class="flex lg:block absolute inset-0 w-full h-full transition-transform ease-in-out will-change-transform"
                     :class="duration"
                     :style="isMobile 
                            ? 'transform: translateX(-' + (activeSlide * 100) + '%)' 
                            : 'transform: translateY(-' + (activeSlide * 100) + '%)'">
                    <template x-for="(image, index) in slides" :key="index">
                        <div class="relative min-w-full w-full h-full lg:h-full flex-shrink-0">
                            <img :src="image" class="absolute inset-0 w-full h-full object-cover">
                        </div>
                    </template>
                </div>
                
                <div class="absolute z-20 flex bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm rounded-full shadow-xl
                            bottom-8 left-1/2 transform -translate-x-1/2 flex-row gap-4 p-1.5
                            lg:top-1/2 lg:right-8 lg:left-auto lg:bottom-auto lg:-translate-y-1/2 lg:translate-x-0 lg:flex-col lg:gap-3 lg:p-3 transition-colors">
                    <button @click="prev()" class="flex items-center justify-center hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full transition hover:scale-110 active:scale-95 w-9 h-9 lg:w-12 lg:h-12 group">
                        <svg class="hidden lg:block w-6 h-6 text-gray-700 dark:text-gray-300 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
                        <svg class="w-5 h-5 text-gray-700 dark:text-gray-300 lg:hidden group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button @click="next()" class="flex items-center justify-center hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full transition hover:scale-110 active:scale-95 w-9 h-9 lg:w-12 lg:h-12 group">
                        <svg class="hidden lg:block w-6 h-6 text-gray-700 dark:text-gray-300 group-hover:translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        <svg class="w-5 h-5 text-gray-700 dark:text-gray-300 lg:hidden group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>

                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 hidden lg:flex items-center gap-2 bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm px-3 py-1.5 lg:px-4 lg:py-2 rounded-full z-20 transition-colors">
                    <span class="text-xs lg:text-sm font-semibold text-gray-700 dark:text-gray-300" x-text="(activeSlide === 0 ? sources.length : (activeSlide === slides.length - 1 ? 1 : activeSlide)) + '/' + sources.length"></span>
                    <div class="flex gap-1">
                        <template x-for="(source, index) in sources" :key="index">
                            <div class="w-6 h-1 lg:w-8 lg:h-1 rounded-full transition-colors duration-300"
                                 :class="(activeSlide === index + 1) || (activeSlide === 0 && index === sources.length - 1) || (activeSlide === slides.length - 1 && index === 0) ? 'bg-blue-600 dark:bg-blue-500' : 'bg-gray-300 dark:bg-gray-600'">
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>