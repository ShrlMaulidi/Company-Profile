<x-layouts.app title="Profil & Sejarah Perusahaan | PT Media Solusi Sukses">
    
    <x-home.hero />

    <div class="pb-20">
        <div class="max-w-screen-2xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8 px-4 sm:px-6 lg:px-8 mt-16">
            
            <x-home.sidebar />
            
            <div class="lg:col-span-3">
                <x-home.profile />
                <x-home.history />
            </div>

        </div>
    </div>

</x-layouts.app>