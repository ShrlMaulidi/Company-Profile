<div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
    
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Kelola Partnership</h2>
            <p class="text-sm text-gray-500">Manajemen logo mitra Corporate, Government, dan Metro.</p>
        </div>
        <button wire:click="openModal" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition shadow-sm flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Partner
        </button>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-50 text-green-700 rounded-lg border border-green-200 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('message') }}
        </div>
    @endif

    <div class="overflow-hidden border border-gray-200 rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Logo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Mitra</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($partners as $partner)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="h-12 w-24 flex items-center justify-center bg-gray-50 border rounded p-1">
                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="max-h-full max-w-full object-contain">
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $partner->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @php
                            $badgeColor = match($partner->category) {
                                'corporate' => 'bg-blue-100 text-blue-800',
                                'government' => 'bg-green-100 text-green-800',
                                'metro' => 'bg-purple-100 text-purple-800',
                                default => 'bg-gray-100 text-gray-800',
                            };
                        @endphp
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $badgeColor }} uppercase">
                            {{ $partner->category }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <button wire:click="edit({{ $partner->id }})" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                        <button wire:click="delete({{ $partner->id }})" 
                                onclick="return confirm('Yakin hapus data ini?')" 
                                class="text-red-600 hover:text-red-900">Hapus</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-10 text-center text-gray-500">Belum ada data partner.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($isOpen)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/50 backdrop-blur-sm p-4 overflow-y-auto">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg transform transition-all">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50 rounded-t-xl">
                <h3 class="text-lg font-bold text-gray-800">
                    {{ $partner_id ? 'Edit Partner' : 'Tambah Partner' }}
                </h3>
                <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600 hover:bg-gray-200 rounded-full p-1 transition">
                    &times;
                </button>
            </div>
            <form wire:submit.prevent="store" class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Mitra</label>
                    <input type="text" wire:model="name" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-200 p-2.5">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select wire:model="category" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-200 p-2.5">
                        <option value="">-- Pilih --</option>
                        <option value="corporate">Corporate</option>
                        <option value="government">Government</option>
                        <option value="metro">Metro</option>
                    </select>
                    @error('category') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                 <label class="block text-sm font-medium text-gray-700 mb-1">Logo</label>
                 <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:bg-gray-50 relative">
                    @if ($logo)
                        <img src="{{ $logo->temporaryUrl() }}" class="mx-auto h-20 object-contain mb-2">
                    @elseif ($oldLogo)
                        <img src="{{ asset('storage/' . $oldLogo) }}" class="mx-auto h-20 object-contain mb-2 opacity-70">
                    @else
                        <div class="flex flex-col items-center justify-center">
                            <span class="text-gray-400 text-sm font-medium">Klik untuk upload gambar</span>
                            <span class="text-gray-400 text-xs mt-1">(Max. 2 MB)</span> 
                        </div>
                    @endif
                    <input type="file" wire:model="logo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                </div>
                <p class="text-xs text-gray-500 mt-1">Format: JPG/PNG. Maksimal ukuran file: 2 MB.</p>
                @error('logo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
                <div class="flex justify-end gap-3 mt-4 pt-4 border-t border-gray-100">
                    <button type="button" wire:click="closeModal" class="px-4 py-2 border rounded-lg hover:bg-gray-50">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>