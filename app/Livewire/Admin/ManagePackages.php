<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Package;

class ManagePackages extends Component
{
    public $packages, $package_id;
    public $name, $type, $speed, $price, $is_popular = false;
    
    public $features = []; 
    public $newFeature = ''; 

    public $isOpen = false;

    public function render()
    {
        $this->packages = Package::latest()->get();
        return view('livewire.admin.manage-packages');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->type = '';
        $this->speed = '';
        $this->price = '';
        $this->features = []; 
        $this->newFeature = '';
        $this->is_popular = false;
        $this->package_id = null;
    }

    public function addFeature()
    {
        if(!empty($this->newFeature)) {
            $this->features[] = $this->newFeature;
            $this->newFeature = ''; 
        }
    }

    public function removeFeature($index)
    {
        unset($this->features[$index]);
        $this->features = array_values($this->features); 
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'type' => 'required|in:residential,business',
            'speed' => 'required',
            'price' => 'required|numeric',
            'features' => 'required|array|min:1', 
        ]);

        Package::updateOrCreate(['id' => $this->package_id], [
            'name' => $this->name,
            'type' => $this->type,
            'speed' => $this->speed,
            'price' => $this->price,
            'features' => $this->features,
            'is_popular' => $this->is_popular ? true : false,
        ]);

        session()->flash('message', 
            $this->package_id ? 'Paket berhasil diperbarui.' : 'Paket baru berhasil ditambahkan.');

        $this->closeModal();
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        $this->package_id = $id;
        $this->name = $package->name;
        $this->type = $package->type;
        $this->speed = $package->speed;
        $this->price = $package->price;
        $this->features = $package->features ?? []; 
        $this->is_popular = $package->is_popular;
        
        $this->openModal();
    }

    public function delete($id)
    {
        Package::find($id)->delete();
        session()->flash('message', 'Paket berhasil dihapus.');
    }
}