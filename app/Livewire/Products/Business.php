<?php

namespace App\Livewire\Products;

use App\Models\Package;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Business extends Component
{
    #[Layout('components.layouts.app', ['title' => 'Solusi Bisnis - PT Media Solusi Sukses'])]
    public function render()
    {
        $packages = Package::where('type', 'business')->get();

        return view('livewire.products.business', [
            'packages' => $packages
        ]);
    }
}