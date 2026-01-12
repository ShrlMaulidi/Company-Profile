<?php

namespace App\Livewire\Admin; 

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class ManagePartnership extends Component
{
    use WithFileUploads;

    public $partners, $name, $logo, $category, $partner_id;
    public $isOpen = false;
    public $oldLogo;

    public function render()
    {
        $this->partners = Partner::latest()->get();
        return view('livewire.admin.managepartnership'); 
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
        $this->logo = null;
        $this->category = '';
        $this->partner_id = null;
        $this->oldLogo = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'category' => 'required|in:corporate,government,metro',
            'logo' => $this->partner_id ? 'nullable|image|max:2048' : 'required|image|max:2048',
        ]);

        if ($this->logo) {
            if ($this->partner_id && $this->oldLogo) {
                Storage::disk('public')->delete($this->oldLogo);
            }
            $imageName = $this->logo->store('partners', 'public');
        } else {
            $imageName = $this->oldLogo;
        }

        Partner::updateOrCreate(['id' => $this->partner_id], [
            'name' => $this->name,
            'category' => $this->category,
            'logo' => $imageName
        ]);

        session()->flash('message', 
            $this->partner_id ? 'Data Partner berhasil diperbarui.' : 'Partner baru berhasil ditambahkan.');

        $this->closeModal();
    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        $this->partner_id = $id;
        $this->name = $partner->name;
        $this->category = $partner->category;
        $this->oldLogo = $partner->logo;
        $this->openModal();
    }

    public function delete($id)
    {
        $partner = Partner::find($id);
        if($partner) {
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $partner->delete();
            session()->flash('message', 'Partner berhasil dihapus.');
        }
    }
}