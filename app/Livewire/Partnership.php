<?php

namespace App\Livewire;

use App\Models\Partner;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Partnership extends Component
{
    public $search = '';
    public $category = 'all'; 

    public function setCategory($cat)
    {
        $this->category = $cat;
    }

    #[Layout('components.layouts.app', ['title' => 'Mitra Kami - PT Media Solusi Sukses'])]
    public function render()
    {
        $partners = Partner::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->category !== 'all', function ($query) {
                $query->where('category', $this->category);
            })
            ->latest()
            ->get();

        return view('livewire.partnership', [
            'partners' => $partners
        ]);
    }
}