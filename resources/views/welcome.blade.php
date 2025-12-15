<x-layouts.landing title="Beranda - PT Media Solusi Sukses">
    
    {{-- 1. HERO BANNER --}}
    {{-- Memanggil file di components/home/hero.blade.php --}}
    <x-home.hero />

    {{-- 2. MAIN CONTENT WRAPPER --}}
    <div class="pb-20">
        <div class="max-w-screen-2xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8 px-4 sm:px-6 lg:px-8 mt-16">
            
            {{-- SIDEBAR --}}
            <aside class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg p-8 sticky top-24">
                    <div class="mb-8">
                        <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=400" alt="Meeting" class="w-full h-48 object-cover rounded-xl mb-4">
                        <h3 class="text-2xl font-bold text-gray-900 text-center">
                            Elevating Your<br><span class="text-blue-600">Venture</span>
                        </h3>
                    </div>
                    <nav class="space-y-2">
                        <h4 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wider">Discover Company</h4>
                        <a href="#" class="block text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-4 py-3 rounded-lg transition-all duration-200 font-medium">Solusi Bisnis</a>
                        <a href="#" class="block text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-4 py-3 rounded-lg transition-all duration-200 font-medium">Perjalanan Kami</a>
                        <a href="#" class="block text-gray-600 hover:text-blue-600 hover:bg-blue-50 px-4 py-3 rounded-lg transition-all duration-200 font-medium">Laporan Kinerja</a>
                    </nav>
                </div>
            </aside>
            
            {{-- KONTEN TENGAH --}}
            <div class="lg:col-span-3">
                
                {{-- SECTION PROFIL --}}
                <section class="mb-20">
                    <h2 class="text-4xl font-bold text-gray-900 mb-10">
                        <span class="border-b-4 border-blue-600 pb-1">Profil</span> Perusahaan
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-white p-8 rounded-2xl shadow-xl border-t-4 border-blue-600">
                            <h3 class="text-2xl font-bold mb-4">Visi</h3>
                            <p class="text-gray-600">Menjadi mitra solusi teknologi terdepan.</p>
                        </div>
                        <div class="bg-white p-8 rounded-2xl shadow-xl border-t-4 border-blue-600">
                            <h3 class="text-2xl font-bold mb-4">Misi</h3>
                            <p class="text-gray-600">Menyediakan infrastruktur IT yang handal.</p>
                        </div>
                        <div class="bg-white p-8 rounded-2xl shadow-xl border-t-4 border-blue-600">
                            <h3 class="text-2xl font-bold mb-4">Nilai Budaya</h3>
                            <p class="text-gray-600">Integrity, Innovation, Impact.</p>
                        </div>
                    </div>
                </section>

                {{-- SECTION SEJARAH --}}
                {{-- Memanggil file di components/home/history.blade.php --}}
                <x-home.history />
                
            </div>
        </div>
    </div>

</x-layouts.landing>