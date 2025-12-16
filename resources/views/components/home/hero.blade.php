<section class="relative bg-gradient-to-r from-blue-900 via-blue-700 to-cyan-500 overflow-hidden">
    <div class="max-w-screen-2xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center min-h-[700px]">
            <div class="px-8 lg:px-16 py-16 lg:py-24">
                <p class="text-cyan-300 font-semibold text-lg mb-4 tracking-wide">#InnovatingYourFuture</p>
                <h1 class="text-5xl lg:text-7xl font-black text-white mb-6 leading-tight">
                    Smart Solutions<br>For Your Business
                </h1>
                <p class="text-gray-200 text-lg mb-8 max-w-lg">
                    Transformasi bisnis Anda melalui solusi teknologi terintegrasi, pengembangan software, dan infrastruktur jaringan handal dari PT Media Solusi Sukses.
                </p>
                <a href="#" class="inline-flex items-center bg-blue-600 text-white px-8 py-4 rounded-lg font-semibold shadow-xl hover:bg-blue-700 transition duration-300 group">
                    Explore Services
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
            
            <div class="relative h-full min-h-[600px] w-full"
     x-data="{
        currentIndex: 0,
        images: [
            'https://images.unsplash.com/photo-1622979135225-d2ba269cf1ac?w=800',
            '{{ asset('depan.jpeg') }}',
            '{{ asset('dalam.jpeg') }}',
            'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=800&q=80',
            'https://images.unsplash.com/photo-1573164713988-8665fc963095?w=800&q=80'
        ],
        next() {
            this.currentIndex = (this.currentIndex + 1) % this.images.length;
        },
        prev() {
            this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
        }
     }"
     x-init="setInterval(() => next(), 3000)">

    <img :src="images[currentIndex]" 
         alt="Technology Solutions" 
         class="absolute inset-0 w-full h-full object-cover transition-all duration-500"
         x-on:click="next()"
         key="currentIndex">
    
    <div class="absolute top-1/2 right-8 transform -translate-y-1/2 flex flex-col gap-3 bg-white/90 backdrop-blur-sm rounded-full p-3 shadow-xl z-10">
        <button @click="prev()" class="w-12 h-12 flex items-center justify-center hover:bg-gray-100 rounded-full transition hover:scale-110 active:scale-95">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
            </svg>
        </button>

        <button @click="next()" class="w-12 h-12 flex items-center justify-center hover:bg-gray-100 rounded-full transition hover:scale-110 active:scale-95">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
    </div>

    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex items-center gap-2 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full z-10">
        <span class="text-sm font-semibold text-gray-700" x-text="(currentIndex + 1) + '/' + images.length"></span>
        <div class="flex gap-1">
            <template x-for="(image, index) in images" :key="index">
                <div class="w-8 h-1 rounded-full transition-colors duration-300"
                     :class="currentIndex === index ? 'bg-blue-600' : 'bg-gray-300'">
                </div>
            </template>
        </div>
    </div>
</div>
    </div>
</section>