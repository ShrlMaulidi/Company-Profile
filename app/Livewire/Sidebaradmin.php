<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactMessage;
use Livewire\Attributes\On; 

class Sidebaradmin extends Component
{
    public $unreadCount = 0;

    public function mount()
    {
        $this->updateUnreadCount();
    }

    #[On('message-updated')] 
    public function updateUnreadCount()
    {
        $this->unreadCount = ContactMessage::where('is_read', false)->count();
    }

    public function render()
    {
        return view('livewire.sidebaradmin');
    }
}