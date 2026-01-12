<x-layouts.app title="Profil & Sejarah Perusahaan | PT Media Solusi Sukses">
    
    @include('components.home.hero')

    <div class="pb-20">
        <div class="max-w-screen-2xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8 px-4 sm:px-6 lg:px-8 mt-16">
            @include('components.home.sidebar')
            <div class="lg:col-span-3 space-y-16">
                @include('components.home.profile')
                @include('components.home.history')
            </div>
        </div>
    </div>

    @include('components.home.features')

    {{-- Pricing Section --}}
    @livewire('home.pricing')

    @include('components.home.partners')

    {{-- Partnership Section --}}
    @livewire('home.partnership')

    {{-- Achievement Section --}}
    @include('components.home.achievement')

    {{-- Testimonial Section --}}
    @include('components.home.testimonial')

</x-layouts.app>