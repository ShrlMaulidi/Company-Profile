<?php

namespace App\Livewire\Home;

use App\Livewire\Navbar; // Jika perlu
use App\Models\Package;
use Livewire\Component;

class Pricing extends Component
{
    public $activeType = 'residential';
    public function setType($type)
    {
        $this->activeType = $type;
    }
    
    public function render()
    {
        // Ambil data dari database sesuai tipe yang aktif
        $packages = Package::where('type', $this->activeType)->get();

        return view('livewire.home.pricing', [
            'packages' => $packages
        ]);
    }
}