<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ContactMessage;

class Messages extends Component
{
    use WithPagination;

    public $selectedMessage = null; 
    public function render()
    {
        return view('livewire.admin.messages', [
            'messages' => ContactMessage::orderBy('is_read', 'asc')
                                        ->orderBy('created_at', 'desc')
                                        ->paginate(10)
        ]);
    }

    public function showDetails($id)
    {
        $message = ContactMessage::find($id);
        
        if ($message) {
            if (!$message->is_read) {
                $message->update(['is_read' => true]);
                $this->dispatch('message-updated'); 
            }

            $this->selectedMessage = $message;
        }
    }

    public function closeModal()
    {
        $this->selectedMessage = null;
    }

    public function delete($id)
    {
        ContactMessage::find($id)->delete();
        $this->dispatch('message-updated'); 
    }
}