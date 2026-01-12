<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactMessage;
use Livewire\Attributes\Rule;

class ContactForm extends Component
{
    #[Rule('required|min:3', as: 'Nama')]
    public $name = '';

    #[Rule('required|email', as: 'Email')]
    public $email = '';

    #[Rule('required', as: 'Subjek')]
    public $subject = '';

    #[Rule('required|min:10', as: 'Pesan')]
    public $message = '';

    public function save()
    {
        $this->validate();
        ContactMessage::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);
        $this->reset();
        $this->dispatch('message-sent');
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}