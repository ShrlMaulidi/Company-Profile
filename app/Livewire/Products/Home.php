<?php

namespace App\Livewire\Products;

use App\Models\Package;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Home extends Component
{
    #[Layout('components.layouts.app', ['title' => 'Internet Rumah - PT Media Solusi Sukses'])]
    public function render()
    {
        $packages = Package::where('type', 'residential')->get();

        return view('livewire.products.home', [
            'packages' => $packages
        ]);
    }
}