<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Package; 

class ChatWidget extends Component
{
    public $message = '';
    public $chats = [];

    public function mount()
    {
        $this->chats[] = [
            'sender' => 'bot',
            'text' => 'Halo! 👋 Selamat datang di PT Media Solusi Sukses. Ketik "halo" atau "menu" untuk memulai.',
            'time' => now()->format('H:i')
        ];
    }

    public function sendMessage()
    {
        $this->validate([
            'message' => 'required|string|max:255',
        ]);

        $inputMessage = $this->message;
        $this->chats[] = [
            'sender' => 'user',
            'text' => $inputMessage,
            'time' => now()->format('H:i')
        ];

        $this->message = '';

        $botReply = $this->generateAutoReply(strtolower($inputMessage));

        $this->chats[] = [
            'sender' => 'bot',
            'text' => $botReply,
            'time' => now()->format('H:i')
        ];
    }

    private function generateAutoReply($keyword)
    {
        if (preg_match('/\b(hi|hii|halo|hallo|hai|hello|pagi|siang|sore|malam|p|tes|menu|help|bantuan)\b/', $keyword)) {
            return "Hii! 👋 Saya asisten virtual PT Media Solusi Sukses.\n\n" .
                   "Silakan tanyakan yang Anda perlukan dengan **kata kunci** berikut:\n\n" .
                   "🔹 **Paket / Harga**\n   Melihat daftar layanan & harga internet.\n\n" .
                   "🔹 **Lokasi / Alamat**\n   Mengecek alamat kantor kami.\n\n" .
                   "🔹 **Kontak / WA**\n   Nomor WhatsApp Admin untuk konsultasi.\n\n" .
                   "__Contoh:__ Ketik 'info harga' atau 'lokasi dimana'";
        }

        if (str_contains($keyword, 'lokasi') || str_contains($keyword, 'alamat') || str_contains($keyword, 'dimana')) {
            return "Kantor kami berlokasi di Karawang. Namun kami melayani klien dari seluruh Indonesia secara remote.";
        }

        if (str_contains($keyword, 'kontak') || str_contains($keyword, 'nomor') || str_contains($keyword, 'wa') || str_contains($keyword, 'whatsapp') || str_contains($keyword, 'hubungi')) {
            return "Anda bisa langsung chat WhatsApp admin kami di nomor:\n\n🏢 +62 856-0029-9019 (For Bisnis)\n🏠 +62 858-8096-4340 (For Rumahan)";
        }

        if (str_contains($keyword, 'paket') || str_contains($keyword, 'harga') || str_contains($keyword, 'layanan') || str_contains($keyword, 'promo')) {
            
            $residential = Package::where('type', 'residential')->orderBy('price', 'asc')->get();
            $business = Package::where('type', 'business')->orderBy('price', 'asc')->get();

            if ($residential->isEmpty() && $business->isEmpty()) {
                return "Mohon maaf, saat ini informasi paket sedang diperbarui. Silakan ketik 'kontak' untuk info manual.";
            }

            $reply = "Berikut adalah daftar layanan kami:\n";

            if ($residential->isNotEmpty()) {
                $reply .= "\n🏠 **Paket Rumahan:**\n";
                foreach ($residential as $pkg) {
                    $price = number_format($pkg->price, 0, ',', '.');
                    $icon = $pkg->is_popular ? '⭐ ' : '• '; 
                    $reply .= "{$icon}{$pkg->name} ({$pkg->speed}): Rp {$price}\n";
                }
            }

            if ($business->isNotEmpty()) {
                $reply .= "\n🏢 **Paket Bisnis:**\n";
                foreach ($business as $pkg) {
                    $price = number_format($pkg->price, 0, ',', '.');
                    $icon = $pkg->is_popular ? '⭐ ' : '• ';
                    $reply .= "{$icon}{$pkg->name} ({$pkg->speed}): Rp {$price}\n";
                }
            }

            $reply .= "\nKetik 'kontak' untuk berlangganan sekarang!";
            return $reply;
        }

        return "Maaf, saya bot otomatis dan belum mengerti pertanyaan itu. 🤔 \n\nSilakan ketik **'halo'** atau **'menu'** untuk melihat daftar kata kunci bantuan.";
    }

    public function render()
    {
        return view('livewire.chat-widget');
    }
}