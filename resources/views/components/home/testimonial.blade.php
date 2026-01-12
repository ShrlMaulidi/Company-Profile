<section class="py-24 bg-slate-50 dark:bg-gray-800 relative overflow-hidden transition-colors duration-300">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-blue-100 dark:bg-blue-900/20 mix-blend-multiply dark:mix-blend-normal filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-0 right-0 w-96 h-96 rounded-full bg-cyan-100 dark:bg-cyan-900/20 mix-blend-multiply dark:mix-blend-normal filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-base text-blue-600 dark:text-blue-400 font-semibold tracking-wide uppercase transition-colors">Testimonial</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl transition-colors">
                Apa Kata Mereka Tentang Kami?
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 dark:text-gray-400 mx-auto transition-colors">
                Kepuasan pelanggan adalah prioritas utama kami. Berikut adalah pengalaman mereka menggunakan layanan PT Media Solusi Sukses.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg shadow-gray-200/50 dark:shadow-gray-900/30 hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-gray-700 relative">
                <div class="absolute top-6 right-8 text-blue-100 dark:text-blue-900/30 transition-colors">
                    <svg width="45" height="45" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V11C14.017 11.5523 13.5693 12 13.017 12H12.017V5H22.017V15C22.017 18.3137 19.3307 21 16.017 21H14.017ZM5.01697 21L5.01697 18C5.01697 16.8954 5.9124 16 7.01697 16H10.017C10.5693 16 11.017 15.5523 11.017 15V9C11.017 8.44772 10.5693 8 10.017 8H6.01697C5.46468 8 5.01697 8.44772 5.01697 9V11C5.01697 11.5523 4.56925 12 4.01697 12H3.01697V5H13.017V15C13.017 18.3137 10.3307 21 7.01697 21H5.01697Z" />
                    </svg>
                </div>

                <div class="flex items-center gap-1 mb-4 text-yellow-400">
                    @for($i=0; $i<5; $i++)
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>

                <p class="text-gray-600 dark:text-gray-300 mb-6 relative z-10 transition-colors">
                    "Koneksi internet dari Media Solusi Sukses sangat stabil, bahkan saat cuaca buruk. Tim support-nya juga sangat responsif membantu kendala teknis di kantor kami."
                </p>

                <div class="flex items-center gap-4">
                <img class="w-12 h-12 rounded-full object-cover ring-2 ring-blue-100 dark:ring-blue-900" 
                     src="{{ asset('jonson.jpeg') }}" 
                     alt="Avatar">
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white transition-colors">Mohammad Julian</h4>
                        <p class="text-sm text-blue-600 dark:text-blue-400 font-medium transition-colors">CEO, PT Maju Mundur</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg shadow-gray-200/50 dark:shadow-gray-900/30 hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-gray-700 relative">
                <div class="absolute top-6 right-8 text-blue-100 dark:text-blue-900/30 transition-colors">
                    <svg width="45" height="45" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V11C14.017 11.5523 13.5693 12 13.017 12H12.017V5H22.017V15C22.017 18.3137 19.3307 21 16.017 21H14.017ZM5.01697 21L5.01697 18C5.01697 16.8954 5.9124 16 7.01697 16H10.017C10.5693 16 11.017 15.5523 11.017 15V9C11.017 8.44772 10.5693 8 10.017 8H6.01697C5.46468 8 5.01697 8.44772 5.01697 9V11C5.01697 11.5523 4.56925 12 4.01697 12H3.01697V5H13.017V15C13.017 18.3137 10.3307 21 7.01697 21H5.01697Z" /></svg>
                </div>
                <div class="flex items-center gap-1 mb-4 text-yellow-400">
                    @for($i=0; $i<5; $i++)
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-gray-600 dark:text-gray-300 mb-6 relative z-10 transition-colors">
                    "Pemasangan Metro-E untuk instansi kami berjalan sangat cepat dan profesional. SLA yang dijanjikan benar-benar terpenuhi 99.9%. Sangat recommended!"
                </p>
                <div class="flex items-center gap-4">
                <img class="w-12 h-12 rounded-full object-cover ring-2 ring-blue-100 dark:ring-blue-900" 
                     src="{{ asset('rifky.jpeg') }}" 
                     alt="Avatar">
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white transition-colors">Rifky Permana</h4>
                        <p class="text-sm text-blue-600 dark:text-blue-400 font-medium transition-colors">CEO Rifky Media</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg shadow-gray-200/50 dark:shadow-gray-900/30 hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-gray-700 relative">
                <div class="absolute top-6 right-8 text-blue-100 dark:text-blue-900/30 transition-colors">
                    <svg width="45" height="45" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V11C14.017 11.5523 13.5693 12 13.017 12H12.017V5H22.017V15C22.017 18.3137 19.3307 21 16.017 21H14.017ZM5.01697 21L5.01697 18C5.01697 16.8954 5.9124 16 7.01697 16H10.017C10.5693 16 11.017 15.5523 11.017 15V9C11.017 8.44772 10.5693 8 10.017 8H6.01697C5.46468 8 5.01697 8.44772 5.01697 9V11C5.01697 11.5523 4.56925 12 4.01697 12H3.01697V5H13.017V15C13.017 18.3137 10.3307 21 7.01697 21H5.01697Z" /></svg>
                </div>
                <div class="flex items-center gap-1 mb-4 text-yellow-400">
                    @for($i=0; $i<5; $i++)
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-gray-600 dark:text-gray-300 mb-6 relative z-10 transition-colors">
                    "Internet rumahan yang stabil dengan harga yang sangat kompetitif. Anak-anak bisa belajar online dengan lancar tanpa buffering. Terima kasih MSS!"
                </p>
                <div class="flex items-center gap-4">
                    <img class="w-12 h-12 rounded-full object-cover ring-2 ring-blue-100 dark:ring-blue-900" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Avatar">
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white transition-colors">Agus</h4>
                        <p class="text-sm text-blue-600 dark:text-blue-400 font-medium transition-colors">RT Kampung Sunyi</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>