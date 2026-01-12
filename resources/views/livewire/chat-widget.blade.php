<div 
    class="flex flex-col h-full bg-gray-50 dark:bg-gray-900 relative" 
    x-data="{ 
        init() {
            // Scroll ke bawah saat pertama kali dibuka
            this.$nextTick(() => this.scrollToBottom());
        },
        scrollToBottom() {
            const container = document.getElementById('chat-container');
            if (container) {
                // Tambahkan sedikit delay agar DOM selesai dirender dulu
                setTimeout(() => {
                    container.scrollTop = container.scrollHeight;
                }, 100); 
            }
        }
    }"
    x-init="
        // Setiap kali ada update dari Livewire (pesan masuk/keluar), paksa scroll ke bawah
        Livewire.hook('morph.updated', ({ component, el }) => {
            scrollToBottom();
        });
        
        // Tambahan: scroll juga saat loading selesai
        Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
            succeed(() => {
                scrollToBottom();
            })
        });
    "
>
    
    <div 
        id="chat-container" 
        class="flex-1 overflow-y-auto p-4 space-y-4 custom-scrollbar pb-20"
    >
        @foreach($chats as $chat)
            <div class="flex {{ $chat['sender'] === 'user' ? 'justify-end' : 'justify-start' }} animate-fade-in-up">
                <div class="max-w-[85%] rounded-2xl px-4 py-2.5 shadow-sm text-sm relative group
                    {{ $chat['sender'] === 'user' 
                        ? 'bg-blue-600 text-white rounded-br-none' 
                        : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 border border-gray-200 dark:border-gray-700 rounded-bl-none' 
                    }}">
                    
                    <div class="whitespace-pre-line leading-relaxed text-[13px] md:text-sm">
                        {!! $chat['text'] !!}
                    </div>
                </div>
            </div>
        @endforeach

        <div wire:loading wire:target="sendMessage" class="flex justify-start w-full py-2">
            <div class="bg-gray-200 dark:bg-gray-700 rounded-full px-4 py-2 flex space-x-1 items-center shadow-sm">
                <span class="text-xs text-gray-500 font-medium mr-1">Mengetik</span>
                <div class="w-1.5 h-1.5 bg-gray-500 rounded-full animate-bounce"></div>
                <div class="w-1.5 h-1.5 bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                <div class="w-1.5 h-1.5 bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0 p-3 bg-white dark:bg-gray-800 border-t border-gray-100 dark:border-gray-700 z-20">
        <form wire:submit.prevent="sendMessage" class="flex items-center space-x-2 relative">
            
            <input 
                type="text" 
                wire:model="message" 
                placeholder="Tulis pesan..." 
                class="w-full text-sm bg-gray-100 dark:bg-gray-700 border-0 rounded-full pl-4 pr-12 py-2.5 focus:ring-2 focus:ring-blue-500 text-gray-700 dark:text-gray-200 focus:outline-none transition-all"
                autocomplete="off"
                x-on:focus="scrollToBottom()"
            >
            
            <button 
                type="submit" 
                class="absolute right-1.5 p-1.5 bg-blue-600 hover:bg-blue-700 rounded-full text-white transition shadow-sm hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed"
                wire:loading.attr="disabled"
            >
                <svg class="w-5 h-5 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
            </button>
        </form>
    </div>
    
    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }
        .dark .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #4b5563; }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fadeInUp 0.2s ease-out forwards; }
    </style>
</div>