<div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
    
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Daftar Paket Internet</h2>
            <p class="text-sm text-gray-500">Kelola paket Residential dan Business.</p>
        </div>
        <button wire:click="openModal" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition shadow-sm flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Tambah Paket
        </button>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-50 text-green-700 rounded-lg border border-green-200 flex items-center">
            <span class="mr-2">✅</span> {{ session('message') }}
        </div>
    @endif

    <div class="overflow-x-auto border border-gray-200 rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Paket</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tipe</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Speed</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fitur</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($packages as $package)
                <tr wire:key="pkg-{{ $package->id }}" class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div class="text-sm font-bold text-gray-900">{{ $package->name }}</div>
                        @if($package->is_popular)
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                                ⭐ Popular
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $package->type == 'residential' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800' }}">
                            {{ ucfirst($package->type) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $package->speed }}</td>
                    <td class="px-6 py-4 text-sm font-bold text-gray-800">
                        Rp {{ number_format($package->price, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        <ul class="list-disc list-inside text-xs">
                            @foreach(array_slice($package->features, 0, 3) as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                            @if(count($package->features) > 3)
                                <li class="text-gray-400 italic">+ {{ count($package->features) - 3 }} lainnya</li>
                            @endif
                        </ul>
                    </td>
                    <td class="px-6 py-4 text-center text-sm font-medium">
                        <button wire:click="edit({{ $package->id }})" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                        <button wire:click="delete({{ $package->id }})" 
                                onclick="return confirm('Hapus paket ini?')" 
                                class="text-red-600 hover:text-red-900">Hapus</button>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="px-6 py-8 text-center text-gray-500">Belum ada paket tersedia.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="fixed inset-0 z-50 items-center justify-center bg-gray-900/50 backdrop-blur-sm p-4 overflow-y-auto {{ $isOpen ? 'flex' : 'hidden' }}">
        
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl transform transition-all"
             x-data="{ show: @entangle('isOpen') }"
             x-show="show"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">
             
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50 rounded-t-xl">
                <h3 class="text-lg font-bold text-gray-800">{{ $package_id ? 'Edit Paket' : 'Buat Paket Baru' }}</h3>
                <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>

            <form wire:submit.prevent="store" class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                
                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Paket</label>
                    <input type="text" wire:model="name" placeholder="Misal: Super Hemat" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2.5">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tipe Paket</label>
                    <select wire:model="type" class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 bg-white">
                        <option value="">-- Pilih Tipe --</option>
                        <option value="residential">Residential (Rumahan)</option>
                        <option value="business">Business (Kantor)</option>
                    </select>
                    @error('type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kecepatan (Speed)</label>
                    <input type="text" wire:model="speed" placeholder="Misal: 50 Mbps" class="w-full border-gray-300 rounded-lg shadow-sm p-2.5">
                    @error('speed') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Angka)</label>
                    <input type="number" wire:model="price" placeholder="Contoh: 250000" class="w-full border-gray-300 rounded-lg shadow-sm p-2.5">
                    @error('price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="col-span-2 flex items-center mt-2">
                    <input type="checkbox" wire:model="is_popular" id="popular" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <label for="popular" class="ml-2 text-sm text-gray-600 font-medium">Tandai sebagai Paket Populer (Best Seller)</label>
                </div>

                <div class="col-span-2 mt-2 border-t pt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Daftar Fitur Paket</label>
                    
                    <div class="flex gap-2 mb-3">
                        <input type="text" wire:model="newFeature" placeholder="Tulis fitur (misal: Gratis Instalasi) lalu klik tambah" 
                               wire:keydown.enter.prevent="addFeature"
                               class="flex-1 border-gray-300 rounded-lg shadow-sm text-sm p-2.5">
                        <button type="button" wire:click="addFeature" class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700">
                            + Tambah
                        </button>
                    </div>

                    <div class="space-y-2 max-h-40 overflow-y-auto bg-gray-50 p-3 rounded-lg border border-gray-200">
                        @forelse($features as $index => $feature)
                            <div wire:key="feature-{{ $index }}" class="flex justify-between items-center bg-white p-2 rounded border border-gray-200 text-sm">
                                <span class="text-gray-700">• {{ $feature }}</span>
                                <button type="button" wire:click="removeFeature({{ $index }})" class="text-red-500 hover:text-red-700 text-xs font-bold px-2">
                                    Hapus
                                </button>
                            </div>
                        @empty
                            <div class="text-gray-400 text-xs text-center italic">Belum ada fitur ditambahkan.</div>
                        @endforelse
                    </div>
                    @error('features') <span class="text-red-500 text-xs block mt-1">Minimal masukkan 1 fitur.</span> @enderror
                </div>

                <div class="col-span-2 flex justify-end gap-3 mt-4 pt-4 border-t border-gray-100">
                    <button type="button" wire:click="closeModal" class="px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan Paket</button>
                </div>
            </form>
        </div>
    </div>
</div>