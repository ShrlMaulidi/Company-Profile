<?php

namespace App\Livewire\Home;

use App\Models\Partner;
use Livewire\Component;

class Partnership extends Component
{
    public function render()
    {
        return view('livewire.home.partnership', [
            'partners' => Partner::all()
        ]);
    }
}