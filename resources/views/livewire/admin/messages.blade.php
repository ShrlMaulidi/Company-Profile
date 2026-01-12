<div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
    
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800">Daftar Pesan Masuk</h2>
        <p class="text-sm text-gray-500">Pesan dari formulir kontak website.</p>
    </div>

    <div class="overflow-x-auto border border-gray-200 rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pengirim</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subjek</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($messages as $msg)
                <tr class="hover:bg-gray-50 transition {{ !$msg->is_read ? 'bg-blue-50/50' : '' }}">
                    <td class="px-6 py-4">
                        <div class="text-sm font-bold text-gray-900">{{ $msg->name }}</div>
                        <div class="text-xs text-gray-500">{{ $msg->email }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm text-gray-700 font-medium">{{ $msg->subject }}</span>
                        <p class="text-xs text-gray-500 truncate w-48">{{ $msg->message }}</p>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        {{ $msg->created_at->diffForHumans() }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if(!$msg->is_read)
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold bg-red-100 text-red-800 animate-pulse">
                                Baru
                            </span>
                        @else
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-600">
                                Dibaca
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center text-sm font-medium">
                        <button wire:click="showDetails({{ $msg->id }})" class="text-blue-600 hover:text-blue-900 mr-3 font-semibold">
                            Lihat
                        </button>
                        <button wire:click="delete({{ $msg->id }})" 
                                onclick="return confirm('Hapus pesan ini?')" 
                                class="text-red-600 hover:text-red-900">
                            Hapus
                        </button>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada pesan masuk.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $messages->links() }} 
        </div>
    </div>

    @if($selectedMessage)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/50 backdrop-blur-sm p-4">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden animate-fade-in-up">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h3 class="text-lg font-bold text-gray-800">Detail Pesan</h3>
                <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase">Pengirim</label>
                    <p class="text-gray-900 font-medium">{{ $selectedMessage->name }} <span class="text-gray-500 font-normal">({{ $selectedMessage->email }})</span></p>
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase">Waktu</label>
                    <p class="text-gray-900">{{ $selectedMessage->created_at->format('d M Y, H:i') }}</p>
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase">Subjek</label>
                    <p class="text-gray-900 font-medium">{{ $selectedMessage->subject }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <label class="text-xs font-semibold text-gray-500 uppercase mb-1 block">Isi Pesan</label>
                    <p class="text-gray-800 whitespace-pre-wrap leading-relaxed">{{ $selectedMessage->message }}</p>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-4 flex justify-end">
                <button wire:click="closeModal" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-sm">
                    Tutup
                </button>
            </div>
        </div>
    </div>
    @endif
</div>